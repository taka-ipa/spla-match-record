<div class="mb-4 ml-{{ $comment->depth * 4 }}">
  <div class="flex items-start gap-2">
    <!-- 名前（固定幅） -->
    <div class="w-[80px] shrink-0 text-sm font-bold text-gray-800 pt-[2px]">
      {{ $comment->user->name }}
    </div>

    <!-- コメント全体を block として扱う -->
    <div class="flex flex-col w-full">
      <div class="text-gray-800 whitespace-pre-wrap break-words w-full">
        {{ $comment->body }}
      </div>
      <!-- <div class="text-sm text-gray-500 mt-1">
        {{ $comment->created_at->diffForHumans() }}
      </div> -->

      @if ($comment->replies->isNotEmpty())
        @foreach ($comment->replies as $reply)
          @include('partials.comment', ['comment' => $reply, 'depth' => ($depth ?? 0) + 1])
        @endforeach
      @endif
    </div>
  </div>
</div>



