<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    <style>
        .dot-font {
            font-family: 'DotGothic16', sans-serif;
        }
    </style>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-900 text-white">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <h1 class="text-4xl mb-2 dot-font">ヨシヒコ道場</h1>
        <p class="text-xl mb-6 dot-font">なんと この道場に 入ると申すか？</p>

        <img src="{{ asset('images/hero.png') }}" alt="スプラ道場のイカちゃん" class="w-64 h-auto mb-6 shadow-lg rounded-lg">

        <div class="bg-black border-4 border-white p-4 w-80 text-left text-lg dot-font">
            <ul id="menu" class="space-y-2 dot-font">
                <li class="menu-item">
                    <a href="{{ route('register') }}" class="block w-full">はい（新規入門）</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('login') }}" class="block w-full">しってます（ログイン）</a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>



