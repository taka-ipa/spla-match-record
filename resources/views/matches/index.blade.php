<x-app-layout>
<body class="bg-gray-100">
    <div class="flex mx-auto max-w-7xl p-6 lg:px-8">
        <div class="flex-1 mr-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">
                    @if (request('scope') == 'all')
                        全てのリザルト
                    @else
                        {{ auth()->user()->name }}さんのリザルト
                    @endif
                </h2>
                <div>
                    <a href="{{ route('matches.index', ['scope' => 'me']) }}"
                       class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-600 focus:outline-none focus:shadow-outline @if (request('scope') != 'all') font-bold @endif">
                        自分のリザルト
                    </a>
                    <a href="{{ route('matches.index', ['scope' => 'all']) }}"
                       class="ml-2 bg-gray-300 text-gray-700 px-3 py-1 rounded-md text-sm hover:bg-gray-400 focus:outline-none focus:shadow-outline @if (request('scope') == 'all') font-bold @endif">
                        全てのリザルト
                    </a>
                    <a href="{{ route('matches.create') }}" class="ml-4 bg-green-500 text-white px-3 py-1 rounded-md text-sm hover:bg-green-600">
                        リザルトを投稿
                    </a>
                </div>
            </div>
            @foreach ($matches as $match)
                <div class="bg-white rounded-lg shadow-md p-4 mb-6 flex items-start">
                    <div class="flex-shrink-0">
                        <span class="text-white
                                    {{ $match->result == 'win' ? 'bg-green-500' : 'bg-red-500' }}
                                    px-2 py-1 rounded-full text-xs font-bold">
                            {{ $match->result == 'win' ? '勝利' : '敗北' }}
                        </span>
                    </div>
                    <div class="ml-4 flex-1">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold">{{ $match->stage->name }}</h3>
                            <span class="text-sm text-gray-500">{{ $match->created_at->format('Y/m/d H:i') }}</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">投稿者: {{ $match->user->name }}</p>
                        <p class="text-sm text-gray-600 mt-1">ルール: {{ $match->rule->name }}</p>
                        <p class="text-sm text-gray-600 mt-1">ステージ: {{ $match->stage->name }}</p>
                        <p class="text-sm text-gray-600 mt-1">武器: {{ $match->weapon->name }}</p>
                        <p class="text-sm text-gray-600 mt-1">バトルメモリー: {{ $match->replay_code }}</p>
                        <p class="text-sm text-gray-600 mt-1">コメント: {{ $match->comment }}</p>
                        <div class="mt-4 flex items-center">
                            <img src="{{ $match->stage->image_path }}" alt="{{ $match->stage->name }}" class="w-16 h-16 rounded-md object-cover">
                            <div class="ml-4 text-sm text-gray-500">
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $matches->links() }}
        </div>
        <div class="w-1/4 sticky top-4 ml-6">
        <form method="GET" action="{{ route('matches.index') }}" class="bg-white rounded-lg shadow-md p-4">
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