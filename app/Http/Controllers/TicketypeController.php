<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketypeRequest;
use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketypeController extends Controller
{
    public function index(){
        $count = TicketType::all();
        return view('ticketype.index', compact('count'));
    }

    public function store(TicketypeRequest $request){
        $data = [
            'name' => $request->type,
            'price' => $request->price,
            'description' => $request->description
        ];
        TicketType::create($data);
        return response()->json([
            'message' =>  'Ticket type created',
            //'status' => (bool)$data
        ]);
    }

    public function data (){
        $ticketypes = TicketType::all();
        
        return response()->json([
            'table' => view('ticketype.data', compact('ticketypes'))->render(),
           
        ]);

    }
}
