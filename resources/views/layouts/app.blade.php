<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    
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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { font-family: 'Cairo', sans-serif; }</style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
