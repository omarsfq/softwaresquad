## نظرة عامة
- الهدف: نشر تلقائي لكل تعديل في فرع main من GitHub إلى استضافة InfinityFree (FTP).
- القيود: لا يوجد SSH على InfinityFree؛ سنبني المشروع داخل GitHub Actions ونرفع الملفات عبر FTP.
- نراعي بنية Laravel بحيث يكون مجلد public هو document root (على InfinityFree هو htdocs).

## خريطة المسارات على InfinityFree
- document root: /htdocs (يعادل public_html).
- نضع هيكل التطبيق (app, vendor, bootstrap, storage, ... إلخ) خارج document root في مسار منفصل مثل /app.
- ننقل فقط محتويات مجلد public إلى /htdocs مع تعديل index.php ليتجه إلى ../app/vendor و../app/bootstrap.

## إعداد أسرار GitHub
- أضف في Settings → Secrets and variables → Actions:
  - FTP_SERVER = ftpupload.net
  - FTP_USERNAME = if0_40348726
  - FTP_PASSWORD = كلمة المرور التي زودتني بها
  - FTP_PORT = 21
  - REMOTE_PUBLIC = /htdocs
  - REMOTE_APP = /app
- لا تضع أي أسرار داخل الكود أو المستودع.

## خطوات النشر داخل GitHub Actions
- المسار: .github/workflows/deploy.yml
- تشغيل عند push إلى main.
- بناء داخل CI: composer install (no-dev) + optimize-autoloader، ثم npm ci + npm run build (إن كنت تستخدم Vite).
- تحضير نسخة public معدّلة: ننسخ public إلى مجلد مؤقت ونعدل index.php ليشير إلى ../app.
- رفع هيكل التطبيق (باستثناء public) إلى /app.
- رفع نسخة public المعدّلة إلى /htdocs.

```yaml
name: Deploy to InfinityFree (FTP)

on:
  push:
    branches: ["main"]

jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - name: Checkout
        uses: actions/checkout@v4

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: "8.2"
          extensions: mbstring, intl, pdo_mysql, bcmath, curl, gd, zip
          coverage: none

      - name: Install dependencies (no-dev)
        run: |
          composer install --no-dev --prefer-dist --optimize-autoloader
          php artisan config:cache
          php artisan route:cache
          php artisan view:cache

      - name: Setup Node [200~and build assets[0m
        uses: actions/setup-node@v4
        with:
          node-version: "18"
          cache: "npm"
      - run: |
          npm ci
          npm run build

      - name: Prepare public for shared hosting
        run: |
          mkdir -p public-prepared
          rsync -av --delete public/ public-prepared/
          # تعديل index.php للإشارة إلى ../app
          sed -i "s#require __DIR__.'/../vendor/autoload.php';#require __DIR__.'/../app/vendor/autoload.php';#" public-prepared/index.php
          sed -i "s#require_once __DIR__.'/../bootstrap/app.php';#require_once __DIR__.'/../app/bootstrap/app.php';#" public-prepared/index.php

      - name: Upload app core to /app
        uses: SamKirkland/FTP-Deploy-Action@v4.3.5
        with:
          server: ${{ secrets.FTP_SERVER }}
          username: ${{ secrets.FTP_USERNAME }}
          password: ${{ secrets.FTP_PASSWORD }}
          port: ${{ secrets.FTP_PORT }}
          local-dir: .
          server-dir: ${{ secrets.REMOTE_APP }}
          exclude: |
            **/public/**
            **/.git/**
            **/.github/**
            **/node_modules/**
            **/.env
            storage/logs/*.log

      - name: Upload public to /htdocs
        uses: SamKirkland/FTP-Deploy-Action@v4.3.5
        with:
          server: ${{ secrets.FTP_SERVER }}
          username: ${{ secrets.FTP_USERNAME }}
          password: ${{ secrets.FTP_PASSWORD }}
          port: ${{ secrets.FTP_PORT }}
          local-dir: public-prepared
          server-dir: ${{ secrets.REMOTE_PUBLIC }}
          exclude: |
            **/.git/**
            **/.github/**
            **/node_modules/**
```

## إعداد .env وقاعدة البيانات
- ضعه يدويًا على السيرفر في مسار /app/.env (لا ترفعه من المستودع) بمحتوى الإنتاج: APP_ENV=production وAPP_DEBUG=false وبيانات قاعدة البيانات الخاصة بـ InfinityFree.
- الهجرات: لا يمكن تشغيل php artisan migrate على InfinityFree، استخدم phpMyAdmin لاستيراد قاعدة البيانات أو أنشئ Route مؤقتة محمية لتشغيل الهجرة مرة واحدة ثم احذفها.

## التحقق بعد النشر
- بعد نجاح Action، افتح موقعك للتحقق من العمل.
- إن رغبت، يمكننا إضافة خطوة Healthcheck HTTP في نهاية الـ workflow.

## ملاحظات مهمة لـ InfinityFree
- حد الحجم والزمن قد يفرض استثناءات؛ أبقِ الاستثناءات واسعة (استبعاد node_modules/.git/.github/tests وما شابه).
- تأكد أن صلاحيات الكتابة متاحة لـ /app/storage.

## ماذا سأقوم به عند الموافقة
- إضافة ملف deploy.yml أعلاه للمستودع.
- مساعدتك في إضافة أسرار Actions بالقيم التي قدمتها.
- رفع أول نسخة مهيّأة، والتحقق من البنية والتوجيه الصحيح لـ index.php.
- تزويدك بتنسيق .env الصحيح وضبط اتصال قاعدة البيانات.

هل ترغب أن أتابع بهذا المسار و أقوم بإعداد ملف الـ workflow مع ضبط الأسرار؟