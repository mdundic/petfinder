<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoundPet extends Model
{

    protected $casts = [
        'found_at'  => 'date:d.m.Y',
    ];
}
