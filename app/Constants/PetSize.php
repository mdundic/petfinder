<?php

namespace App\Constants;

class PetSize
{
    const SMALL = 'small';
    const MEDIUM = 'medium';
    const LARGE = 'large';

    public static function getAll() {
        return [
            self::SMALL,
            self::MEDIUM,
            self::LARGE
        ];
    }
}