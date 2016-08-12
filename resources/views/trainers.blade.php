@extends('layouts.master')
@section('body')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            <div class="item active" align="center">
				<img src="/images/trainers/kadaeva.jpg" alt="Алиса Кадаева" width="50%">
                <div class="carousel-caption">
                    <h3>Алиса Кадаева</h3>
                    <p>   </p>
                </div>
            </div>

            <div class="item" align="center">
                <img src="/images/trainers/ovechkina.jpg" alt="Елена Овечкина" width="50%">
                <div class="carousel-caption">
                    <h3>Елена Овечкина</h3>
                    <p> </p>
                </div>
            </div>

            <div class="item" align="center">
                <img src="/images/trainers/zaharova.jpg" alt="Ольга Захарова" width="50%">
                <div class="carousel-caption">
                    <h3>Ольга Захарова</h3>
                    <p>     </p>
                </div>
            </div>
            <div class="item" align="center">
                <img src="/images/trainers/ovcharenko.jpg" alt="Никита Овчаренко" width="50%">
                <div class="carousel-caption">
                    <h3>Никита Овчаренко</h3>
                    <p>     </p>
                </div>
            </div>
            <div class="item" align="center">
                <img src="/images/trainers/andreeva.jpg" alt="Анна Андреева" width="50%">
                <div class="carousel-caption">
                    <h3>Анна Андреева</h3>
                    <p>     </p>
                </div>
            </div>
            <div class="item" align="center">
                <img src="/images/trainers/subocheva.jpg" alt="Светлана Субочева" width="50%">
                <div class="carousel-caption">
                    <h3>Светлана Субочева</h3>
                    <p>     </p>
                </div>
            </div>
            <div class="item" align="center">
                <img src="/images/trainers/klimina.jpg" alt="Татьяна Климина" width="50%">
                <div class="carousel-caption">
                    <h3>Татьяна Климина</h3>
                    <p>     </p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="alert" align="center">
        <h1><p>Наш тренеский состав</p></h1>
    </div>
@endsection