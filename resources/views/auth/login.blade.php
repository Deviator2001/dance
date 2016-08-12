@extends('layouts.master')
@section('body')
<h2>Войти на сайт</h2>
    {!! Form::open() !!}
    @include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Ваш Email:   ', 'placeholder' => 'Ваш Email' ])
    @include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Ваш Пароль: ', 'placeholder' => 'Пароль' ])
    @include('widgets.form._formitem_checkbox', ['name' => 'remember', 'title' => 'Запомнить меня'] )
    @include('widgets.form._formitem_btn_submit', ['title' => 'Вход'])
    {!! Form::close() !!}
{!! Form::close() !!}
<p><a href="{{URL::to('/reset')}}">Забыли пароль?</a></p>
<p><a href="{{URL::to('/register')}}">Зарегистрироваться</a></p>
@endsection