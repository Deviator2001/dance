@extends('layouts.master')
@section('body')

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?PHP
            $slide = 0;
            ?>
            @foreach($styles as $style)
                @foreach($style->attaches as $attach)
                    <li data-target="#myCarousel" data-slide-to="{{($slide++)}}"></li>
                @endforeach()
            @endforeach
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @foreach($styles as $style)
                    @foreach($style->attaches as $attach)
                    <div class="item" align="center">
                        <img src="/images/{{($attach->filename)}}" width="50%" alt="{{($attach->title)}}">
                        <div class="carousel-caption">
                            <h3>{{($attach->title)}}</h3>
                        </div>
                    </div>
                    @endforeach()
            @endforeach
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
        <h1><p>Стили и направления</p></h1>
    </div>
@endsection