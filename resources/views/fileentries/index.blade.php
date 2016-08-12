@extends('layouts.master')
@section('body')

    <form action="{{ route('addentry', $galery_id) }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="file" name="filefield">
        <input type="submit" value="Добавить">
    </form>
@endsection