@extends('layouts.master')
@section('body')
<h1>Добавление записи</h1>
<form method="post" action="{{ route('post.store') }}">
    <div class="form-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <table border="0">
    <tr>
    <td><label for="title">Заголовок: </label></td>
    <td><input type="text" name="title"></td>
    </tr>
    <tr>
    <td><label for="content">Содержание: </label></td>
    <td><input type="text" name="content"></td>
    </tr>
    </table>
    <input class="btn btn-primary" type="submit" value="Добавить"></td>
    </div>
    </form>
@endsection