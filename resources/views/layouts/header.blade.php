<section class="flex bg-black text-white shadow h-10 py-2 border-b-2">
  <div class="container mx-auto px-4 flex justify-between items-center max-w-screen-sm sm:max-w-screen-lg">
    <a href="{{ route('matches.index') }}" class="text-white font-bold">ヨシヒコ道場</a>
    <div class="flex items-center">
      @auth
        <a href="{{ route('profile.edit') }}" class="text-white">マイページ</a>
      @endauth
      @guest
        <a href="{{ route('register') }}" class="mr-2 text-white">ユーザー登録（無料）</a>
        <a href="{{ route('login') }}" class="text-white">ログイン</a>
      @endguest
    </div>
  </div>
</section>
