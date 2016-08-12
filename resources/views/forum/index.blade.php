@extends('layouts.master')
@section('body')
    @foreach($messages as $message)
        <div class="container-fluid">
            <h3>{!!$message->title!!}</h3>
            <p>{!!$message->created_at!!}</p>
            <p><b>{!!$message->text!!}</b></p>
            @foreach($message->comments as $comment)
                <p>{!!$comment->text!!}</p>
                <p>{!!$comment->created_at!!}</p>
                <p>{!!$comment->user_id!!}</p>
                <form action={{ route('comment.delete', [$comment->id])}} method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <button type="submit">Удалить комментарий</button>
                </form>
            @endforeach
        <a class="btn btn-sm btn-success" href="{{ route('message.create', $message->id) }}">Добавить комментарий</a>
        <a class="btn btn-sm btn-default" href="{{ URL::to('message/' . $message->id . '/edit') }}">Изменить</a>
        <form action={{ route('message.destroy', [$message->id])}} method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit">Удалить</button>
        </form>
        </div>
    @endforeach
    <p>{!!$messages->render()!!}</p>
@endsection