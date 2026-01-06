<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MLDPG6V0LP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MLDPG6V0LP');
</script>

    <meta name="google-site-verification" content="rubig0kHLVcHzCT8YxtitEyVFr4kvm2blprDn1e-XP0" />
    <meta name="google-site-verification" content="abcGSGW6QVcYLnPNpwLa0tIhWEt-HK-vVVlzMQpeqSk" />
    <!-- Meta الأساسية -->
    <title>الفريق البرمجي</title>
    <meta name="description" content="فريق Software Squad يقدم خدمات البرمجة، تطوير المواقع والتطبيقات، وإدارة المشاريع التقنية .">
    <meta name="keywords" content="Software Squad, برمجة, سوريا, تطوير تطبيقات, فريق برمجي, Laravel, Flutter, تصميم مواقع">
    <meta name="author" content="Software Squad">

    <!-- تحسين العرض لمحركات البحث -->
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Software Squad | الفريق البرمجي السوري">
    <meta property="og:description" content="فريق برمجي متخصص في تطوير المواقع والتطبيقات بخبرة عالية.">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:url" content="https://softwaresquad.net">
    <meta property="og:type" content="website">
	<link rel="icon" type="image/png" href="{{ asset('images/logo.jpg') }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- تم تصحيح امتداد ونوع الأيقونة --}}
    <link rel="icon" type="image/png" href="https://softwaresquad.net/logo.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="font-sans text-gray-900 antialiased bg-brand-blue">
    <div class="min-h-screen flex flex-col">

        <nav x-data="{ open: false }" class="bg-white shadow-md">
            <nav x-data="{ open: false }" class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <div class="flex-shrink-0 flex items-center space-x-2 space-x-reverse">
    <a href="{{ route('home') }}" class="flex items-center space-x-2 space-x-reverse">
        <img src="{{ asset('images/logo.jpg') }}" alt="شعار فريق Software Squad" class="h-10 w-auto rounded-md shadow-sm">
        <span class="text-lg font-bold text-gray-800 hover:text-brand-blue transition duration-200">
              Software Squad
        </span>
    </a>
</div>


            <div class="hidden md:flex items-center space-x-8 space-x-reverse">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-brand-blue px-3 py-2 rounded-md text-sm font-medium">الرئيسية</a>
                <a href="{{ route('about') }}" class="text-gray-600 hover:text-brand-blue px-3 py-2 rounded-md text-sm font-medium">من نحن</a>
                <a href="{{ route('projects.index') }}" class="text-gray-600 hover:text-brand-blue px-3 py-2 rounded-md text-sm font-medium">مشاريعنا</a>
                <a href="{{ route('contact.form') }}" class="text-gray-600 hover:text-brand-blue px-3 py-2 rounded-md text-sm font-medium">تواصل معنا</a>
                @can('access-admin')
                    <a href="{{ route('admin.projects.index') }}" class="text-gray-600 hover:text-brand-blue px-3 py-2 rounded-md text-sm font-medium">لوحة التحكم</a>
                @endcan
            </div>

            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-brand-blue">
                    <span class="sr-only">Open main menu</span>
                    <svg :class="{'hidden': open, 'block': !open }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg :class="{'hidden': !open, 'block': open }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}" class="block text-gray-600 hover:text-brand-blue hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">الرئيسية</a>
            <a href="{{ route('about') }}" class="block text-gray-600 hover:text-brand-blue hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">من نحن</a>
            <a href="{{ route('projects.index') }}" class="block text-gray-600 hover:text-brand-blue hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">مشاريعنا</a>
            <a href="{{ route('contact.form') }}" class="block text-gray-600 hover:text-brand-blue hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">تواصل معنا</a>
            @can('access-admin')
                <a href="{{ route('admin.projects.index') }}" class="block text-gray-600 hover:text-brand-blue hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">لوحة التحكم</a>
            @endcan
        </div>
    </div>
</nav>
        </nav>

        <main class="flex-grow">
            @yield('content')
        </main>

        {{-- تم تعديل تصميم التذييل --}}
        <footer class="bg-brand-navy border-t border-slate-700">
            <div class="max-w-7xl mx-auto py-6 px-4 text-center text-slate-400">
                <p>&copy; {{ date('Y') }} Software Squad. جميع الحقوق محفوظة.</p>
            </div>
        </footer>
    </div>
</body>
</html>
