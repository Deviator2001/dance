<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar">1</span>
					<span class="icon-bar">2</span>
					<span class="icon-bar">3</span>
				</button>
			</div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">На главную</a></li>
                    <li><a href="/category">Наши товары</a></li>
                    <li><a href="/post/index">Гостевая книга</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Войти</a></li>
                    <li><a href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-registration-mark"></span> Регистрация</a></li>
                    @else
                    <li><a href="{{ url('/admin') }}"><span class="glyphicon glyphicon-wrench"></span> Управление сайтом</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="glyphicon glyphicon-user"></span></a>
                            <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}">Выйти</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
    </nav>
    <div class="row">
        <div class="container-fluid">
            <div class="col-sm-2" style="background-color:lavender;">
                @yield('category')
            </div>
            <div class="col-sm-8" well>
                @yield('content')
            </div>
            <div class="col-sm-2" style="background-color:lavender;">
                    <form class="form form-inline" action="{{ route('site.search') }}">
                        <input type="text" class="form-control" id="search" name="search">
                        <button type="submit" btn-sm class="btn btn-default">Найти</button>
                    </form>
            </div>
        </div>
    </div>

    <div class="panel-footer">
    Panel Footer
    <?php
    if (isset ($search))
    {
        echo $search;
    }
    ?>
    </div>
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
