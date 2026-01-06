<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>الفريق البرمجي</title>
<meta name="description" content="فريق Software Squad البرمجي، متخصصون في تطوير المواقع والتطبيقات في سوريا. نقدم حلولًا برمجية احترافية في Laravel وFlutter.">
<meta name="keywords" content="Software Squad, الفريق البرمجي, برمجة, برمجة سوريا, مطورين, Laravel, Flutter, مواقع ويب, تطبيقات">
<meta name="robots" content="index, follow">
<meta property="og:title" content="Software Squad | الفريق البرمجي السوري">
<meta property="og:description" content="نطوّر حلولًا رقمية احترافية باستخدام Laravel وFlutter.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://softwaresquad.net>
<meta property="og:image" content="https://softwaresquad.net/images/logo.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
