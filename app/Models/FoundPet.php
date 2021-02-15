<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoundPet extends Model
{

    protected $casts = [
        'found_at'  => 'date:d.m.Y',
    ];

    /** Get the date formated
     *
     * @param $value
     *
     * @return string | null
     */
    public function getFoundAtAttribute($value)
    {
        return format_date_rs($value);
    }
}
