@extends('layouts.master')
@section('body')
<h1>Добавление записи</h1>
<form method="post" action="{{ route('message.create') }}">
    <div class="form-group">
    {{ csrf_field() }}
    <table border="0">
    <tr>
    <td><label for="title">Заголовок: </label></td>
    <td><input type="text" name="title"></td>
    </tr>
    <tr>
    <td><label for="text">Содержание: </label></td>
    <td><input type="text" name="text"></td>
    </tr>
    </table>
    <input class="btn btn-primary" type="submit" value="Добавить"></td>
    </div>
    </form>
@endsection