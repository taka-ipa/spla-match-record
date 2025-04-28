@props(['hideHeader' => false])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- 省略 -->
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        
        {{-- 共通ヘッダーもhideHeaderがfalseの時だけ --}}
        @unless ($hideHeader)
            @include('layouts.header')

            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header ?? '' }}
                </div>
            </header>
        @endunless

        <!-- ページごとの内容 -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>


