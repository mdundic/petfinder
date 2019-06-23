<?php

namespace App\Constants;

class PetColor
{
    const BLACK = 'black';
    const WHITE = 'white';
    const GRAY = 'gray';
    const BROWN = 'brown';

    /**
     * Get array with pet colors.
     *
     * @return void
     */
    public static function getAll() : array
    {
        return [
            self::BLACK,
            self::WHITE,
            self::GRAY,
            self::BROWN
        ];
    }
}
