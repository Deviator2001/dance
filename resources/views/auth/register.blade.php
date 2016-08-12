@extends('layouts.master')
@section('body')
<h2>Регистрация на сайте</h2>
<h3>Введите ваши данные</h3>
    {!! Form::open() !!}
    @include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Электронная почта', 'placeholder' => 'Ваш Email' ])
    @include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Укажите пароль', 'placeholder' => 'Пароль' ])
    @include('widgets.form._formitem_password', ['name' => 'password_confirm', 'title' => 'Подтверждение пароля', 'placeholder' => 'Пароль' ])
    @include('widgets.form._formitem_btn_submit', ['title' => 'Зарегистрироваться'])
    {!! Form::close() !!}
@stop