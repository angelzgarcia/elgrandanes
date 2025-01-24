<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function upcomingEventsIndex()
    {

        return view('users.events.upcomingIndex');
    }

    public function previousEventsIndex()
    {
        return view('users.events.previousIndex');
    }
}
