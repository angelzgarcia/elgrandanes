<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $sessions = DB::table('sessions')
                        -> where('user_id', Auth::user()->id)
                        -> limit(2)
                        -> get();

        foreach ($sessions as $session) {
            $session -> last_activity = \Carbon\Carbon::parse($session->last_activity) -> diffForHumans();
            $osDetails = preg_match('/\((.*?)\)/', $session -> user_agent, $os);
            $session -> os = str_replace('(', '', explode(';', $os[0])[0]);
            $browserDetails = preg_match('/Chrome\/[\d\.]+|Safari\/[\d\.]+|Firefox\/[\d\.]+/', $session -> user_agent, $browser);
            $session -> browser = explode('/', $browser[0])[0];
        }

        return view('admin.profile.index', compact('sessions'));
    }

}
