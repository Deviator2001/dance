@extends('layouts.master')
@section('body')
    @foreach($schedules as $schedule)
        <div class="container-fluid">
            <h3>{!!$schedule->title!!}</h3>
			<a href="/public/{{($schedule->schedule)}}"><img src="/images/icons/xls.gif"></a>
        </div>
    @endforeach
    <p>{!!$schedules->render()!!}</p>
@endsection