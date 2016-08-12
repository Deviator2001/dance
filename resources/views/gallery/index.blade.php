@extends('layouts.master')
@section('body')
    @foreach($gallerys as $gallery)
        <div class="container-fluid">
            <h3>{!!$gallery->title!!}</h3>
            <p>{!!$gallery->created_at!!}</p>
            <div class="gallery">
                @foreach($gallery->attaches as $attach)
                    <a rel="gallery" class="photo" href="/images/{{($attach->filename)}}"><img src="/images/{{($attach->filename)}}" width="171" alt="" /></a>
                    <!--<a href="/images/{{($attach->filename)}}"><img src="/{{$attach->filename}}" alt="{{$attach->alt}}" width="173"></a>-->
                @endforeach
            </div>
        </div>
    @endforeach
    <p>{!!$gallerys->render()!!}</p>
@endsection