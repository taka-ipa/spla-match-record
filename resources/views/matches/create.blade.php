<x-app-layout>
    test
<form action="{{ route('matches.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h3 class="text-lg font-semibold mb-2">ステージを選択</h3>

    <select name="stage" class="block w-full px-4 py-2 border border-gray-300 rounded-lg 
        focus:ring-2 focus:ring-blue-400 focus:outline-none">
        <option value="">ステージを選択</option>
        @foreach ($stages as $stage)
            <option value="{{ $stage->id }}">{{ $stage->name }}</option>
        @endforeach
    </select>
    <label>ルール: <input type="text" name="rule"></label><br>
    <label>武器: <input type="text" name="weapon"></label><br>
    <label>勝敗:
        <select name="result">
            <option value="win">勝ち</option>
            <option value="lose">負け</option>
        </select>
    </label><br>
    <label>コメント: <textarea name="comment"></textarea></label><br>
    <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
        送信
    </button>
</form>
</x-app-layout>
