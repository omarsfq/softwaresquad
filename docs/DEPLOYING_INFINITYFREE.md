# نشر Laravel إلى InfinityFree عبر GitHub Actions (FTP)

## نظرة عامة
- يعتمد النشر على GitHub Actions لبناء المشروع ورفع الملفات عبر FTP إلى InfinityFree.
- نضع هيكل التطبيق خارج document root في `/app`، ونرفع محتويات `public` إلى `/htdocs` مع تعديل `index.php` تلقائيًا داخل الـ workflow.

## إعداد الأسرار (Secrets)
أضف القيم التالية في المستودع: Settings → Secrets and variables → Actions

- `FTP_SERVER`: ftpupload.net
- `FTP_USERNAME`: اسم المستخدم في InfinityFree (مثل if0_XXXXXXX)
- `FTP_PASSWORD`: كلمة المرور لحساب FTP
- `FTP_PORT`: 21
- `REMOTE_PUBLIC`: /htdocs
- `REMOTE_APP`: /app
- اختياري: `HEALTHCHECK_URL`: رابط صفحة فحص صحة التطبيق بعد النشر (إن رغبت).

مهم: لا تضع هذه القيم داخل الكود أو ملفات النسخة. استخدم Secrets فقط.

## متطلبات المشروع
- مشروع Laravel قياسي.
- عدم وجود ملف `.env` داخل المستودع العام.
- إن كنت تستخدم Vite أو Mix تأكد من إعداد أمر `npm run build`.

## كيفية العمل
- عند أي push إلى فرع `main`:
  1. يتم تثبيت Composer بدون dev وبناء الأصول الأمامية.
  2. تُحضّر نسخة `public-prepared` بتعديل `index.php` لتشير إلى `../app/vendor` و`../app/bootstrap`.
  3. تُرفع ملفات التطبيق (باستثناء public) إلى `/app`.
  4. تُرفع محتويات `public-prepared` إلى `/htdocs`.
  5. اختياريًا: تنفيذ Healthcheck إن تم تعريفه.

## إعداد .env على السيرفر
- أنشئ ملف `/app/.env` يدويًا عبر مدير الملفات داخل InfinityFree، بمحتوى الإنتاج:
  - `APP_ENV=production`
  - `APP_DEBUG=false`
  - `APP_URL=https://YOUR_DOMAIN`
  - إعدادات قاعدة البيانات الخاصة بـ InfinityFree (Mysql):
    - `DB_CONNECTION=mysql`
    - `DB_HOST`
    - `DB_PORT=3306`
    - `DB_DATABASE`
    - `DB_USERNAME`
    - `DB_PASSWORD`
  - `APP_KEY` يجب أن يكون مضبوطًا لقيمة صالحة. يمكنك توليده محليًا بـ `php artisan key:generate` ثم نقله إلى السيرفر.

## قاعدة البيانات والهجرات
- لا تتوفر أوامر SSH على InfinityFree، لذا استخدم phpMyAdmin لاستيراد قاعدة البيانات أو تشغيل الهجرات محليًا وتصديرها.
- خيار متقدم (غير مستحب): إنشاء Route مؤقتة محمية لتنفيذ `php artisan migrate` مرة واحدة، ثم حذفها مباشرة بعد التنفيذ.

## مشاكل شائعة
- ظهور خطأ في التحميل بسبب `index.php`: تأكد أن الـ workflow عدّل المسارات بشكل صحيح وأن محتوى `public` وصل إلى `/htdocs`.
- أصول CSS/JS غير موجودة: تأكد من نجاح خطوة `npm run build` وأن الملفات وصلت إلى `/htdocs`.
- صلاحيات الكتابة لـ `storage`: تأكد أن `/app/storage` قابل للكتابة.

## دعم إضافي
- راقب تبويب Actions في المستودع لأي فشل في خطوات النشر.
- يمكنك ضبط الاستثناءات في الـ workflow لتقليل حجم المرفوعات عبر FTP.

