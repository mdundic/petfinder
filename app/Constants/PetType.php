<?php

namespace App\Constants;

class PetType
{
    const CAT = 'cat';
    const DOG = 'dog';

    public static function getAll() {
        return [
            self::CAT,
            self::DOG,
        ];
    }
}