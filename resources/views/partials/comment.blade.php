<div class="mb-4 ml-{{ $comment->depth * 4 }}">
    <div class="flex items-start">
        <div class="mr-2">
            {{ $comment->user->name }}
        </div>
        <div>
            <div class="flex items-baseline"> {{-- コメントとタイムスタンプを横並びにするための div --}}
                <p class="text-gray-800 mr-2">{{ $comment->body }}</p>
                <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex items-center text-sm text-gray-500 mt-1"></div>
            @if ($comment->replies->isNotEmpty())
                @foreach ($comment->replies as $reply)
                    @include('partials.comment', ['comment' => $reply, 'depth' => ($depth ?? 0) + 1])
                @endforeach
            @endif
        </div>
    </div>
</div>