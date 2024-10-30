<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTicket extends Model
{
    use HasFactory;
    protected $table = "order_tickets";
    protected $fillable = [
        'order_id', 'ticket_type_id', 'barcode', 'quantity'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function ticketType(){
        return $this->belongsTo(TicketType::class);
    }
}
