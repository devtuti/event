<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Events;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index (){
        return view('dashboard.index');
    }

    public function data (){
        $users = User::all();
        $events = Events::where('admin', '!=',auth()->user()->id)->with('user')->get();
        $my_event = Events::where('admin',auth()->user()->id)->with('user')->get();
        return response()->json([
            'table' => view('users.list', compact('users'))->render(),
            'event_table' => view('events.list', compact('events'))->render(),
            'my_event_table' => view('events.my_events', compact('my_event'))->render()
        ]);

    }


    
}
