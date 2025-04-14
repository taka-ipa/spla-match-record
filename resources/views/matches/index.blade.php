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
                    <a href="{{ route('matches.index', ['scope' => 'me']) }}" class=" ... ">自分のリザルト</a>
                    <a href="{{ route('matches.index', ['scope' => 'all']) }}" class=" ... ">全てのリザルト</a>
                    <a href="{{ route('matches.create') }}" class=" ... ">リザルトを投稿</a>
                </div>
            </div>
            @foreach ($matches as $match)
                <div class="bg-white rounded-lg shadow-md p-4 mb-6 result-item" data-match-id="{{ $match->id }}">
                    <div class="flex items-start justify-between cursor-pointer show-comments-trigger">
                        <div class="flex-shrink-0">
                            <span class=" ... ">{{ $match->result == 'win' ? '勝利' : '敗北' }}</span>
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
                                            <button type="submit" class=" ... ">削除</button>
                                        </form>
                                    @endif
                                    <button class="text-gray-500 hover:text-gray-700 focus:outline-none comment-button">
                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.124C2.92 12.166 2 10.359 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm4 0H9v2h2V9zm4 0h-2v2h2V9z" clip-rule="evenodd"/></svg>
                                    </button>
                                </div>
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

                    <div class="mt-4 comments-section" style="display: none;">
                        <h4 class="font-semibold mb-2">コメント</h4>
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
                </div>
            @endforeach
            {{ $matches->links() }}
        </div>
        <div class="w-1/4 sticky top-4 ml-6">
            <form method="GET" action="{{ route('matches.index') }}" class="bg-white rounded-lg shadow-md p-4">
                <div class="mb-2">
                    <label for="rule" class="block text-gray-700 text-xs font-bold mb-1 sm:text-sm">ルール</label>
                    <select name="rule" id="rule" class=" ... ">...</select>
                </div>
                <div class="mb-2">
                    <label for="stage" class="block text-gray-700 text-xs font-bold mb-1 sm:text-sm">ステージ</label>
                    <select name="stage" id="stage" class=" ... ">...</select>
                </div>
                <div class="mb-2">
                    <label for="weapon" class="block text-gray-700 text-xs font-bold mb-1 sm:text-sm">武器</label>
                    <select name="weapon" id="weapon" class=" ... ">...</select>
                </div>
                <div class="mb-2">
                    <label for="comment" class="block text-gray-700 text-xs font-bold mb-1 sm:text-sm">コメント</label>
                    <input type="text" name="comment" id="comment" placeholder="検索" value="{{ request('comment') }}" class=" ... ">
                </div>
                <input type="hidden" name="scope" value="{{ request('scope') }}">
                <div class="mt-2">
                    <button type="submit" class=" ... ">検索</button>
                    <a href="{{ route('matches.index', ['scope' => request('scope')]) }}" class=" ... ">クリア</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const resultItems = document.querySelectorAll('.result-item');

        resultItems.forEach(item => {
            const showCommentsTrigger = item.querySelector('.show-comments-trigger');
            const commentButton = item.querySelector('.comment-button');
            const commentsSection = item.querySelector('.comments-section');

            const replyButtons = item.querySelectorAll('.reply-button');
            const replyCancelButton = item.querySelector('.reply-cancel-button');
            const replyToInput = item.querySelector('.reply-to-input');
            const commentForm = item.querySelector('.comment-form');

            // リザルトクリックでコメント表示/非表示
            showCommentsTrigger.addEventListener('click', function() {
                commentsSection.style.display = commentsSection.style.display === 'none' ? 'block' : 'none';
            });

            // コメントボタンクリックでもコメント表示/非表示 (イベント伝播を防ぐ)
            commentButton.addEventListener('click', function(event) {
                event.stopPropagation();
                commentsSection.style.display = commentsSection.style.display === 'none' ? 'block' : 'none';
            });

            // 返信ボタンの処理
            replyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const commentId = this.dataset.commentId;
                    replyToInput.value = commentId;
                    replyCancelButton.style.display = 'inline-block';
                });
            });

            // 返信キャンセルボタンの処理
            replyCancelButton.addEventListener('click', function() {
                replyToInput.value = '';
                this.style.display = 'none';
            });

            // コメント投稿フォームの送信時に replyTo をリセット
            commentForm.addEventListener('submit', function() {
                replyToInput.value = '';
                replyCancelButton.style.display = 'none';
            });
        });
    });
</script>
</x-app-layout>