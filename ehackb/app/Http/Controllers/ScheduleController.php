<?php

namespace App\Http\Controllers;

use App\Event;

class ScheduleController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('schedule.index');
    }

    public function show(Event $event)
    {
        return view('schedule.show')
            ->with('event', $event);
    }
}
