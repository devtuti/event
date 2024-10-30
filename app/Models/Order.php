<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        'event_id', 'user_id', 'total_price'
    ];

    public function event(){
        return $this->belongsTo(Events::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderTickets(): HasMany
    {
        return $this->hasMany(OrderTicket::class);
    }
}
