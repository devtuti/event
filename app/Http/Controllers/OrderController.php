<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Events;
use App\Models\Order;
use App\Models\OrderTicket;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Http;
use Illuminate\Support\Str;


class OrderController extends Controller
{
    public function index(){
        $events = Events::where('admin', auth()->user()->id)->get();
        $types = TicketType::all();
        return view('order.index', compact('events','types'));
    }

    private function generateUniqueBarcode(){
        do{
            $barcode = Str::uuid();
        }while(OrderTicket::where('barcode', $barcode)->exists());
        return $barcode;
    }

    public function store(OrderRequest $request){
        $totalPrice = 0;
        foreach($request->tickets as $ticket){
            $ticketType = TicketType::findOrFail($ticket['type_id']);
            $totalPrice += $ticketType->price * $ticket['quantity'];
        }
        $data = [
            'event_id' => $request->event_id,
            'total_price' =>  $totalPrice,
            'created_at' => now()
        ];

        $order = Order::create($data);

        foreach($request->tickets as $ticket){
            for($i = 0; $i < $ticket['quantity']; $i++){
                $barcode = $this->generateUniqueBarcode();

                $orderticket = OrderTicket::create([
                    'order_id' => $order->id,
                    'ticket_type_id' => $ticket['type_id'],
                    'quantity' => $ticket['quantity'],
                    'barcode' => $barcode,
                ]);
            }
        }
        $this->bookAndApproveOrder($order, $orderticket);
        return response()->json([
            'message' =>  'Order created',
            //'status' => (bool)$data
        ]);
    }

    private function bookAndApproveOrder($order, $orderticket){
        $ticketData = [
            'event_id' => $order->event_id,
            'event_date' => $order->created_at,
            'tickets' => $orderticket->ticket_type_id,
            'barcode' => $orderticket->barcode,
        ];

        do{
            $response = Http::post('https://api.site.com/book', $ticketData);
            if($response->successful() && $response->json('message') === 'order successfully booked'){
                $approveResponse = Http::post('https://api.site.com/approve', ['barcode' => $ticketData['barcode']]);
                if($approveResponse->successful() && $approveResponse->json('message') === 'order successfully approved'){
                    $order->status = 'approved';
                    $order->save();
                    return true;
                }
            }
        }while($response ->json('error') === 'barcode already exists');
    }

    public function data (){
        $order_tickets = OrderTicket::with('order','ticket_type', 'order.user','order.event')->get();
        
        return response()->json([
            'table' => view('order.data', compact('order_tickets'))->render(),
           
        ]);

    }
}
