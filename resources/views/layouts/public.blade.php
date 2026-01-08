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
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
    <link rel="dns-prefetch" href="//www.googletagmanager.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    {{-- تم تصحيح امتداد ونوع الأيقونة --}}
    <link rel="icon" type="image/png" href="https://softwaresquad.net/logo.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Software Squad",
      "url": "https://softwaresquad.net",
      "logo": "{{ asset('images/logo.jpg') }}",
      "sameAs": []
    }
    </script>
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="font-sans text-gray-900 antialiased bg-brand-blue">
    <div class="min-h-screen flex flex-col">
        <x-navbar />

        <main class="flex-grow">
            @yield('content')
        </main>

        <x-footer />
    </div>
</body>
</html>
