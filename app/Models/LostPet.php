<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LostPet extends Model
{

    protected $casts = [
        'lost_at'  => 'date:d.m.Y',
    ];

    /** Get the date formated
     *
     * @param $value
     *
     * @return string | null
     */
    public function getLostAtAttribute($value)
    {
        return format_date_rs($value);
    }
}
