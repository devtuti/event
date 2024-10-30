<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User_to_Event extends Model
{
    use HasFactory;
    protected $table = 'user_to_event';
    protected $fillable = [
        'user_id', 'event_id'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function event(): HasMany
    {
        return $this->hasMany(Events::class, 'id', 'event_id');
    }
}
