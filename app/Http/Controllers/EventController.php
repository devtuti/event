<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventstoreRequest;
use App\Http\Requests\EventUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\User_to_Event;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index(){
        return view('events.new');
    }

    public function store(EventstoreRequest $request){
        $data = [
            'head' => $request->header,
            'text' => $request->text,
            'admin' => auth()->user()->id
        ];
        Events::create($data);
        return redirect()->route('index');
    }

    public function edit($id){
        $event = Events::where('id',$id)->first();
        return response()->json($event);
    }

    public function update(EventUpdateRequest $request){
        $data = [
            'head' => $request->header,
            'text' => $request->text
        ];
        $result = Events::where('id',$request->id)->update($data);
        return response()->json([
            'message' => $result ? 'Event updated' : 'Error',
            'status' => (bool)$result
        ]);
    }

    public function detail($id){
        $event = Events::with('user')->where('id',$id)->first();
        $users = User_to_Event::where('event_id',$id)->with('user')->get();
        return view('events.detail', compact('event','users'));
    }

    public function delete($id)
    {
        $del = Events::find($id)->delete();
        return response()->json([
            'message' => 'Event deleted',
            'status' => (bool)$del
        ]);
    }
}
