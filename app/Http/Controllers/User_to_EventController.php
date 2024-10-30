<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_to_Event;

class User_to_EventController extends Controller
{
    public function join(){
        $data = [
            'event_id' => request('event_id'),
            'user_id' => auth()->user()->id
        ];
        if(User_to_Event::where('event_id', request('event_id'))
                        ->where('user_id', auth()->user()->id)
                        ->first()){}else{
                            User_to_Event::create($data);
                        }
        
                        return back();
    }

    public function leave()
    {
        //echo request('event_id');die;
        $del = User_to_Event::where('event_id',request('event_id'))->where('user_id', auth()->user()->id)->delete();
        if($del){
            return back();
        }
       
    }
}
