<x-app-layout>
    <form action="{{ route('matches.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <select name="stage" class="block w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
            <option value="">ステージを選択</option>
            @foreach ($stages as $stage)
                <option value="{{ $stage->id }}">{{ $stage->name }}</option>
            @endforeach
        </select><br>

        <select name="rule" class="block w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
            <option value="">ルールを選択</option>
            @foreach ($rules as $rule)
                <option value="{{ $rule->id }}">{{ $rule->name }}</option>
            @endforeach
        </select><br>

        <select name="weapon" class="block w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
            <option value="">武器を選択</option>
            @foreach ($weapons as $weapon)
                <option value="{{ $weapon->id }}">{{ $weapon->name }}</option>
            @endforeach
        </select><br>

        <select name="result" class="block w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
            <option value="win">勝ち</option>
            <option value="lose">負け</option>
        </select><br>

        <label>バトルメモリー: <input type="text" name="replay_code" class="block w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"></label><br>

        <label>コメント: <textarea name="comment" class="block w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea></label><br>

        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            送信
        </button>
    </form>
</x-app-layout>