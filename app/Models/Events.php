<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Events extends Model
{
    use HasFactory;
    protected $table = "events";
    protected $fillable = [
        'head', 'text', 'admin'
    ];

   
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'admin');
    }

    public function user_to_event(): HasMany
    {
        return $this->hasMany(User_to_Event::class, 'event_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
