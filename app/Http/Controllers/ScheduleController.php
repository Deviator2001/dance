<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

use App\Http\Requests;

class ScheduleController extends Controller
{
    public function index()
    {

        $schedules=Schedule::latest('id')->where('Published', '1')->paginate(10);

        return view('schedule', ['schedules' => $schedules]);

    }
}
