<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TicketType extends Model
{
    use HasFactory;
    protected $table = "ticket_types";
    protected $fillable = ['name', 'price', 'description'];

    public function orderTickets(): HasMany
    {
        return $this->hasMany(OrderTicket::class);
    }
}
