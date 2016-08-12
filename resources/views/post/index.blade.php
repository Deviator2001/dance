@extends('layouts.master')
@section('body')
@foreach($posts as $post)
        <div class="container-fluid">

            <h3>{!!$post->title!!}</h3>
            <p>{!!$post->created_at!!}</p>
            <p><b>{!!$post->content!!}</b></p>
            <div class="gallery">
            @foreach($post->attaches as $attach)
				<a rel="gallery" class="photo" href="/images/{{($attach->filename)}}"><img src="/images/{{($attach->filename)}}" width="171" alt="" /></a>
				<!--<a href="/images/{{($attach->filename)}}"><img src="/{{$attach->filename}}" alt="{{$attach->alt}}" width="173"></a>-->
            @endforeach
            </div>
        </div>
    @endforeach
    <p>{!!$posts->render()!!}</p>
@endsection