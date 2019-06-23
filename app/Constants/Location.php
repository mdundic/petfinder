<?php

namespace App\Constants;

class Location
{
    const BELGRADE = 'belgrade';
    const PANCEVO = 'pancevo';

    public static function getAll() {
        return [
            self::BELGRADE,
            self::PANCEVO
        ];
    }
}