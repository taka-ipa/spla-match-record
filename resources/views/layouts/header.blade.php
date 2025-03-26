<section class="flex bg-black text-white shadow h-10 py-2 border-b-2">
  <div class="container mx-auto flex justify-between">
    <a href="{{route('matches.index')}}" class="">ヨシヒコ道場</p>
    <div class="flex">
      @auth
        <a href="{{route('profile.edit')}}" class="ml-auto text-white">マイページ</a>
      @endauth
      @guest
        <a href="{{route('register')}}" class="mr-2 text-white">ユーザー登録（無料）</a>
        <a href="{{route('login')}}" class="text-white">ログイン</a>
      @endguest
    </div>
  </div>
</section>