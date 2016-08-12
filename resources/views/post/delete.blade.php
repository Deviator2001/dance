<form action={{ route('post.destroy', [$post->id])}} method="post">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <button type="submit">Удалить</button>
</form>