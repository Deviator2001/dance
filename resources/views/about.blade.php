@extends('layouts.master')
@section('body')
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <div class="item active">
					<img src="/images/slider/1.jpg" alt="Chania" width="100%">
                    <div class="carousel-caption">
                        <h3>Chania</h3>
                        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                    </div>
                </div>

                <div class="item">
					<img src="/images/slider/2.jpg" alt="Chania" width="100%">
                    <div class="carousel-caption">
                        <h3>Chania</h3>
                        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                    </div>
                </div>

                <div class="item">
					<img src="/images/slider/3.jpg" alt="Flower" width="100%">
                    <div class="carousel-caption">
                        <h3>Flowers</h3>
                        <p>Beatiful flowers in Kolymbari, Crete.</p>
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
        <div class="alert">
        <h1><p>&nbsp Мы работаем для тех, кто следует модным тенденциям и готов сделать танцы частью своей жизни. Наша цель раскрыть талант , помочь ребятам найти себя в творческом мире.</p>
        <p>Преимущества занятий в клубе &#171;TRIUMPH DANCE FAMILY&#187;</p>
        <p>*профессиональные преподаватели, работающие по специальным программам обучения;<br />
                *неограниченное количество занятий и индивидуальные программы;<br />
                *большой выбор групповых программ;<br />
                *мастер-классы с ведущими преподавателями;<br />
                *настоящая клубная жизнь &#8212; неформальное общение в приятном обществе;<br />
                *возможность с удовольствием поддерживать хорошую физическую форму, развить координацию, чувство ритма, сформировать правильную осанку;<br />
                *подготовка показательных номеров;<br />
                *постановка свадебного танца как в классическом стиле, так и с использованием любых стилей с учетом современных трендов;<br />
                *возможность участия в международных конкурсах<br /></h1>
        </div>
@endsection
