<?php

namespace App\Constants;

class PetSize
{
    const SMALL = 'small';
    const MEDIUM = 'medium';
    const LARGE = 'large';

    /**
     * Get array with pet sizes.
     *
     * @return array
     */
    public static function getAll() : array
    {
        return [
            self::SMALL,
            self::MEDIUM,
            self::LARGE
        ];
    }
}