<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LostPet extends Model
{

    protected $casts = [
        'lost_at'  => 'date:d.m.Y',
    ];
}
