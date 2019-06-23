<?php

namespace App\Constants;

class PetType
{
    const CAT = 'cat';
    const DOG = 'dog';

    /**
     * Get array with pet types.
     *
     * @return array
     */
    public static function getAll() : array
    {
        return [
            self::CAT,
            self::DOG,
        ];
    }
}
