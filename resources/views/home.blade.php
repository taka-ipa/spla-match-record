<x-app-layout>
    <div class="bg-gray-900 text-white min-h-screen flex flex-col items-center justify-center">
        <h1 class="text-4xl mb-2 dot-font">ヨシヒコ道場</h1>
        <p class="text-xl mb-6 dot-font">なんと この道場に 入ると申すか？</p>

        <img src="{{ asset('images/hero.png') }}" alt="スプラ道場のイカちゃん" class="w-64 h-auto mb-6 shadow-lg rounded-lg">

        {{-- ドラクエ風選択肢UI --}}
        <div class="bg-black border-4 border-white p-4 w-80 text-left text-lg dot-font">
            <ul id="menu" class="space-y-2">
                <li class="menu-item" data-link="{{ route('login') }}">押忍！（ログイン）</li>
                <li class="menu-item" data-link="{{ route('register') }}">新規入門</li>
            </ul>
        </div>
    </div>
</x-app-layout>

