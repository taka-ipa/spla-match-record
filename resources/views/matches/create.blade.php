<form action="{{ route('matches.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>ステージ画像: <input type="file" name="stage"></label><br>
    <label>ルール: <input type="text" name="rule"></label><br>
    <label>武器: <input type="text" name="weapon"></label><br>
    <label>勝敗:
        <select name="result">
            <option value="win">勝ち</option>
            <option value="lose">負け</option>
        </select>
    </label><br>
    <label>コメント: <textarea name="comment"></textarea></label><br>
    <button type="submit">投稿</button>
</form>
