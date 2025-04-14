<div class="mb-4 ml-{{ $comment->depth * 4 }}">
    <div class="flex items-start">
        <div class="mr-2">
            {{ $comment->user->name }}
        </div>
        <div>
            <p class="text-gray-800">{{ $comment->body }}</p>
            <div class="flex items-center text-sm text-gray-500 mt-1">
                <span class="mr-2">{{ $comment->created_at->diffForHumans() }}</span>
                <button class="focus:outline-none reply-button" data-comment-id="{{ $comment->id }}">返信する</button>
            </div>
            @if ($comment->replies->isNotEmpty())
                @foreach ($comment->replies as $reply)
                    @include('partials.comment', ['comment' => $reply, 'depth' => ($depth ?? 0) + 1])
                @endforeach
            @endif
        </div>
    </div>
</div>