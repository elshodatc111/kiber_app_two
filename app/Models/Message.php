<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'search_id',
        'user_id',
        'text',
        'phone',
    ];
}
