<x-app-layout>
<form action="{{ route('matches.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-xl ml-0 sm:ml-4">

    @csrf

    <div class="mb-4">
      <label for="stage" class="block mb-2 font-bold text-gray-700 text-base">ステージ</label>
      <select name="stage" id="stage"
        class="block w-full sm:w-1/3 min-w-[16rem] text-base px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
        <option value="">ステージを選択</option>
        @foreach ($stages as $stage)
          <option value="{{ $stage->id }}">{{ $stage->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-4">
      <label for="rule" class="block mb-2 font-bold text-gray-700 text-base">ルール</label>
      <select name="rule" id="rule"
        class="block w-full sm:w-1/3 min-w-[16rem] text-base px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
        <option value="">ルールを選択</option>
        @foreach ($rules as $rule)
          <option value="{{ $rule->id }}">{{ $rule->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-4">
      <label for="weapon" class="block mb-2 font-bold text-gray-700 text-base">武器</label>
      <select name="weapon" id="weapon"
        class="block w-full sm:w-1/3 min-w-[16rem] text-base px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
        <option value="">武器を選択</option>
        @foreach ($weapons as $weapon)
          <option value="{{ $weapon->id }}">{{ $weapon->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-4">
      <label for="result" class="block mb-2 font-bold text-gray-700 text-base">勝敗</label>
      <select name="result" id="result"
        class="block w-full sm:w-1/3 min-w-[16rem] text-base px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
        <option value="win">勝ち</option>
        <option value="lose">負け</option>
      </select>
    </div>

    <div class="mb-4">
      <label for="replay_code" class="block mb-2 font-bold text-gray-700 text-base">バトルメモリー</label>
      <textarea name="replay_code" id="replay_code"
        rows="2"
        placeholder="スプラの共有からコピーした内容をそのまま貼り付けてください（例：#ガチヤグラ https://〜）"
        class="block w-full sm:w-1/3 min-w-[30rem] text-base px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
    </div>

    <div class="mb-4">
      <label for="comment" class="block mb-2 font-bold text-gray-700 text-base">コメント</label>
      <textarea name="comment" id="comment" rows="3"
        class="block w-full sm:w-1/3 text-base px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
    </div>

    <button type="submit"
      class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-base">
      送信
    </button>
  </form>
</x-app-layout>

