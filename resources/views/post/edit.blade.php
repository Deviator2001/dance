@extends('layouts.master')
@section('body')
<form method="post" action={{ route('post.update', $post->id)}}>
    <label class="control-label">Заголовок: </label>
    <input type="text" name="title" value="{{$post->title}}">
    <label class="control-label">Slug: </label>
    <input type="text" name="slug" value="{{$post->slug}}"/>
    <label class="control-label">Содержание: </label>
    <input type="text" name="content" value="{{$post->content}}"/>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input class="btn btn-primary" type="submit" value="Изменить">
</form>
@endsection