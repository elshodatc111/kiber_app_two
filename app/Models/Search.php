<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $fillable = [
        'region_id',
        'fio',
        'adress',
        'photo',
        'birthday',
        'substance',
        'qyj',
        'type',
    ];
}