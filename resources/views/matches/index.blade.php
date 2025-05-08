<x-app-layout>
  <head>
    <link rel="stylesheet" href="{{ asset('css/matches.css') }}">
  </head>
  <body class="bg-gray-100">
    <div class="flex flex-col lg:flex-row mx-auto max-w-7xl p-6 lg:px-8">
      <div class="flex-1 lg:mr-6">

      <div class="mb-4">
        <div class="flex justify-between items-start sm:items-center flex-wrap gap-2">
            <!-- 左：見出し -->
            <h2 class="text-xl font-bold header-title">
            @if (request('scope') == 'all')
                全てのリザルト
            @else
                {{ auth()->user()->name }}さんのリザルト
            @endif
            </h2>

            <!-- 右：🔍検索ボタン（スマホ限定） -->
            <div class="sm:hidden ml-auto">
            <button onclick="scrollToSearch()" class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-600 focus:outline-none focus:shadow-outline">
                🔍検索
            </button>
            </div>
        </div>

        <!-- リザルト切替・投稿ボタン群 -->
        <div class="mt-2 flex flex-col sm:flex-row items-start sm:items-center gap-2">
            <a href="{{ route('matches.index', ['scope' => 'me']) }}"
            class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm text-center hover:bg-blue-600 focus:outline-none focus:shadow-outline @if (request('scope') != 'all') font-bold @endif">
            {{ auth()->user()->name }}のリザルト
            </a>
            <a href="{{ route('matches.index', ['scope' => 'all']) }}"
            class="bg-gray-300 text-gray-700 px-3 py-1 rounded-md text-sm text-center hover:bg-gray-400 focus:outline-none focus:shadow-outline @if (request('scope') == 'all') font-bold @endif">
                全てのリザルト
            </a>
            <a href="{{ route('matches.create') }}"
            class="bg-green-500 text-white px-3 py-1 rounded-md text-sm text-center hover:bg-green-600">
                リザルトを投稿
            </a>
        </div>
      </div>


        @foreach ($matches as $match)
          <div class="bg-white rounded-lg shadow-md p-4 mb-6 flex items-start match-card">
            <div class="flex-shrink-0">
              <span class="text-white {{ $match->result == 'win' ? 'bg-green-500' : 'bg-red-500' }} px-2 py-1 rounded-full text-xs font-bold">
                {{ $match->result == 'win' ? '勝利' : '敗北' }}
              </span>
            </div>
            <div class="ml-4 flex-1">
              <div class="flex items-center justify-between">
                <div>
                  <h3 class="text-lg font-semibold">{{ $match->stage->name }}</h3>
                  <span class="text-sm text-gray-500">{{ $match->created_at->format('Y/m/d H:i') }}</span>
                </div>
                <div class="flex items-center">
                  @if (auth()->id() === $match->user_id)
                    <form method="POST" action="{{ route('matches.destroy', $match->id) }}" onsubmit="return confirm('本当に削除しますか？');" class="mr-2">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bg-red-500 text-white rounded-full px-3 py-1 text-xs font-semibold hover:bg-red-600 focus:outline-none focus:shadow-outline">
                        削除
                      </button>
                    </form>
                  @endif
                  <button onclick="goToMatchShow('{{ route('matches.show', $match->id) }}')" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.124C2.92 12.166 2 10.359 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm4 0H9v2h2V9zm4 0h-2v2h2V9z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
              </div>
              <p class="text-sm text-gray-600 mt-1">投稿者: {{ $match->user->name }}</p>
              <p class="text-sm text-gray-600 mt-1">ルール: {{ $match->rule->name }}</p>
              <p class="text-sm text-gray-600 mt-1">ステージ: {{ $match->stage->name }}</p>
              <p class="text-sm text-gray-600 mt-1">武器: {{ $match->weapon->name }}</p>
              @php
                $text = $match->replay_code ?? '';

                // URLだけリンクに変換（他はそのまま表示）
                $formatted = preg_replace_callback(
                  '/https?:\/\/[^\s]+/',
                  fn($matches) => '<a href="' . e($matches[0]) . '" class="text-blue-500 underline" target="_blank" rel="noopener noreferrer">' . e($matches[0]) . '</a>',
                  e($text)
                );
              @endphp

              <p class="text-sm text-gray-600 mt-1">
                バトルメモリー: {!! $formatted ?: 'なし' !!}
              </p>
              <p class="text-sm text-gray-600 mt-1">コメント: {{ $match->comment }}</p>
              <div class="mt-4 flex items-center">
                <img src="{{ $match->stage->image_path }}" alt="{{ $match->stage->name }}" class="w-16 h-16 rounded-md object-cover">
              </div>
            </div>
          </div>
        @endforeach

        {{ $matches->links() }}
      </div>

      <div class="w-full lg:w-1/4 sticky top-4 lg:ml-6 sidebar-form">
        <form id="search-form" method="GET" action="{{ route('matches.index') }}" class="bg-white rounded-lg shadow-md p-4">
          <div class="mb-2">
            <label for="rule" class="block text-gray-700 text-xs font-bold mb-1 sm:text-sm">ルール</label>
            <select name="rule" id="rule" class="shadow appearance-none border rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-xs sm:text-sm">
              <option value="">すべて</option>
              @foreach ($rules as $rule)
                <option value="{{ $rule->id }}" {{ request('rule') == $rule->id ? 'selected' : '' }}>{{ $rule->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-2">
            <label for="stage" class="block text-gray-700 text-xs font-bold mb-1 sm:text-sm">ステージ</label>
            <select name="stage" id="stage" class="shadow appearance-none border rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-xs sm:text-sm">
              <option value="">すべて</option>
              @foreach ($stages as $stage)
                <option value="{{ $stage->id }}" {{ request('stage') == $stage->id ? 'selected' : '' }}>{{ $stage->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-2">
            <label for="weapon" class="block text-gray-700 text-xs font-bold mb-1 sm:text-sm">武器</label>
            <select name="weapon" id="weapon" class="shadow appearance-none border rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-xs sm:text-sm">
              <option value="">すべて</option>
              @foreach ($weapons as $weapon)
                <option value="{{ $weapon->id }}" {{ request('weapon') == $weapon->id ? 'selected' : '' }}>{{ $weapon->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-2">
            <label for="comment" class="block text-gray-700 text-xs font-bold mb-1 sm:text-sm">コメント</label>
            <input type="text" name="comment" id="comment" placeholder="検索" value="{{ request('comment') }}" class="shadow appearance-none border rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-xs sm:text-sm">
          </div>
          <input type="hidden" name="scope" value="{{ request('scope') }}">
          <div class="mt-2">
            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-md text-xs sm:text-sm hover:bg-blue-600 focus:outline-none focus:shadow-outline w-full mb-1">
              検索
            </button>
            <a href="{{ route('matches.index', ['scope' => request('scope')]) }}" class="inline-block text-gray-600 hover:text-gray-800 w-full text-center text-xs sm:text-sm">
              クリア
            </a>
          </div>
        </form>
      </div>
    </div>
  </body>
</x-app-layout>

<script>
  function goToMatchShow(url) {
    window.location.href = url;
  }

  function scrollToSearch() {
    const target = document.getElementById('search-form');
    if (target) {
      target.scrollIntoView({ behavior: 'smooth' });
    }
  }
</script>
