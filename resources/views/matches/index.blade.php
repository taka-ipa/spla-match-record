@foreach ($matches as $match)
    <div>
        <p>ルール: {{ $match->rule->name }}</p>
        <!-- <img src="{{ asset('storage/' . $match->stage->image) }}" width="200"> -->
        <p>ステージ: {{ $match->stage->name }}</p>
        <p>武器: {{ $match->weapon->name }}</p>
        <p>結果: {{ $match->result == 'win' ? '勝ち' : '負け' }}</p>
        <p>コメント: {{ $match->comment }}</p>
    </div>
@endforeach
