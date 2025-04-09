<x-app-layout>
<body class="bg-gray-100">
    <div class="flex mx-auto max-w-7xl p-6 lg:px-8">
        <div class="flex-1 mr-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">{{ auth()->user()->name }}さんのリザルト</h2>
                <a href="{{ route('matches.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    リザルトを投稿
                </a>
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
        <div class="w-1/4 bg-white rounded-lg shadow-md p-6 sticky top-6 ml-6">
            <form method="GET" action="{{ route('matches.index') }}">
                <div class="mb-4">
                    <label for="rule" class="block text-gray-700 text-sm font-bold mb-2">ルール</label>
                    <select name="rule" id="rule" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">すべてのルール</option>
                        @foreach ($rules as $rule)
                            <option value="{{ $rule->id }}" {{ request('rule') == $rule->id ? 'selected' : '' }}>{{ $rule->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="stage" class="block text-gray-700 text-sm font-bold mb-2">ステージ</label>
                    <select name="stage" id="stage" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">すべてのステージ</option>
                        @foreach ($stages as $stage)
                            <option value="{{ $stage->id }}" {{ request('stage') == $stage->id ? 'selected' : '' }}>{{ $stage->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="weapon" class="block text-gray-700 text-sm font-bold mb-2">武器</label>
                    <select name="weapon" id="weapon" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">すべての武器</option>
                        @foreach ($weapons as $weapon)
                            <option value="{{ $weapon->id }}" {{ request('weapon') == $weapon->id ? 'selected' : '' }}>{{ $weapon->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">コメント</label>
                    <input type="text" name="comment" id="comment" placeholder="コメントで検索" value="{{ request('comment') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline w-full mb-2">
                        検索
                    </button>
                    <a href="{{ route('matches.index') }}" class="inline-block text-gray-600 hover:text-gray-800 w-full text-center">
                        クリア
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</x-app-layout>