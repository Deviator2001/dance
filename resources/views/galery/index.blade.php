@extends('layouts.master')
@section('body')
@foreach($galerys as $galery)
        <div class="container-fluid">
        <h3>{!!$galery->title!!}</h3>
        <p>{!!$galery->created_at!!}</p>
        <p><b>{!!$galery->content!!}</b></p>
            @foreach($galery->images as $image)
                <p><a href="/images/galeryimages/{{$image->galery_id}}/{{$image->filename}}"><img src="/images/galeryimages/{{$image->galery_id}}/{{$image->filename}}" width = 200"></a></p>
                <!--<p>{{$image->original_filename}}</p>-->
            <a class="btn btn-sm btn-danger" href="{{ route('delentry', $image->filename) }}">Удалить картинку</a>
            @endforeach

            <a class="btn btn-sm btn-success" href="{{ route('fileentry', $galery->id) }}">Добавить картинку</a>
            <a class="btn btn-sm btn-default" href="{{ URL::to('galery/' . $galery->id . '/edit') }}">Изменить</a>
        <form action={{ route('galery.destroy', [$galery->id])}} method="post">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button type="submit">Удалить</button>
        </form>
        </div>
    @endforeach
    <p>{!!$galerys->render()!!}</p>
@endsection