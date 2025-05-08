<x-app-layout>
    <body class="bg-gray-100">
        <div class="mx-auto max-w-7xl p-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md p-6 relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <span class="text-white
                                {{ $match->result == 'win' ? 'bg-green-500' : 'bg-red-500' }}
                                px-2 py-1 rounded-full text-xs font-bold mr-2">
                            {{ $match->result == 'win' ? '勝利' : '敗北' }}
                        </span>
                        <h2 class="text-xl font-bold">{{ $match->stage->name }}のリザルト</h2>
                    </div>
                    <a href="{{ route('matches.index', ['scope' => request('scope')]) }}" class="bg-gray-300 text-gray-700 px-3 py-1 rounded-md text-sm hover:bg-gray-400 focus:outline-none focus:shadow-outline">
                        戻る
                    </a>
                </div>
                <p>投稿者: {{ $match->user->name }}</p>
                <p>日時: {{ $match->created_at->format('Y/m/d H:i') }}</p>
                <p>ルール: {{ $match->rule->name }}</p>
                <p>ステージ: {{ $match->stage->name }}</p>
                <p>武器: {{ $match->weapon->name }}</p>
                @php
                    $text = $match->replay_code ?? '';

                    // URLだけリンク化
                    $formatted = preg_replace_callback(
                        '/https?:\/\/[^\s]+/',
                        fn($matches) => '<a href="' . e($matches[0]) . '" class="text-blue-500 underline" target="_blank" rel="noopener noreferrer">' . e($matches[0]) . '</a>',
                        e($text)
                    );
                @endphp

                <p class="text-base text-gray-800 mb-2">
                    <strong>バトルメモリー:</strong><br>
                    {!! $formatted ?: 'なし' !!}
                </p>

                <p>コメント: {{ $match->comment }}</p>
                <div class="mt-4">
                    <img src="{{ $match->stage->image_path }}" alt="{{ $match->stage->name }}" class="w-32 h-32 rounded-md object-cover">
                </div>
            </div>
        </div>
        <div x-show="openComments" class="mt-4">
          <!-- <h4 class="font-semibold mb-2">コメント</h4> -->
          @forelse ($match->comments as $comment)
              @include('partials.comment', ['comment' => $comment])
          @empty
              <p class="text-gray-500">まだコメントはありません。</p>
          @endforelse

          <h4 class="font-semibold mt-4 mb-2">コメントを投稿</h4>
          <form method="POST" action="{{ route('comments.store', $match->id) }}" class="comment-form">
              @csrf
              <input type="hidden" name="parent_id" class="reply-to-input">
              <textarea name="body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3" placeholder="コメントを入力"></textarea>
              <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline mt-2">投稿</button>
              <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:shadow-outline mt-2 ml-2 reply-cancel-button" style="display: none;">返信キャンセル</button>
          </form>
        </div>
    </body>
</x-app-layout>