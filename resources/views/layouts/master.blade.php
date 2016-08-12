<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

<head>
	@include('header.head')
</head>

<body>
    <header id="header" class="">
		@include('header.header')
    </header>
<div class="container-fluid">
    <div class="jumbotron">
        <a href="/"><img src="/images/logo/logo.jpg" width="100%"></a>
    </div>
<nav class="nav navbar-nav">
    <div class="btn-group">
        <a href="/"><button type="button" class="btn btn-danger btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;О нас&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
        <a href="/post/index"><button type = "button" class="btn btn-danger btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Новости&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
        <a href="/styles"><button type="button" class="btn btn-danger btn-sm">Стили и направления</button></a>
        <a href="/schedule"><button type="button" class="btn btn-danger btn-sm">Расписание занятий</button></a>
        <a href="/trainers"><button type="button" class="btn btn-danger btn-sm">&nbsp;&nbsp;&nbsp;Наши тренеры&nbsp;&nbsp;&nbsp;</button></a>
        <a href="/category"><button type="button" class="btn btn-danger btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Галерея&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
        <a href="/message/index"><button type="button" class="btn btn-danger btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Форум&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
        <a href="/contacts"><button type="button" class="btn btn-danger btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Контакты&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
    </div>
    <div class="btn-group">
        @if (Sentinel::guest())
        <a href="/login"><button type="button" class="btn btn-danger btn-sm">Войти на сайт</button></a>
        @else
        <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>{{Sentinel::check()->email}}</button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="/admin"><button type="button" class="btn btn-danger btn-sm">Управление</button></a></li>
            <li><a href="/logout"><button type="button" class="btn btn-danger btn-sm">Выйти</button></a></li>
        </ul>
    </div>
        @endif
</nav>

<section>
    @include('errors.errmsg')
</section>

    <div class="col-sm-3">

    </div>
    <div class="col-sm-6">
        <div class="semilayer">
        </div>
        @yield('body')
    </div>
    <div class="col-sm-3">
        @yield('bodyright')
    </div>
</div>
    @include('footer.footer')
    @include('footer.foot_script')
</body>
</html>