<?php

namespace App\Constants;

class Location
{
    const BELGRADE = 'belgrade';
    const PANCEVO = 'pancevo';

    /**
     * Get array with locations.
     *
     * @return array
     */
    public static function getAll() : array
    {
        return [
            self::BELGRADE,
            self::PANCEVO
        ];
    }
}