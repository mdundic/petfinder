<?php

namespace App\Constants;

class PetColor
{
    const BLACK = 'black';
    const WHITE = 'white';
    const GRAY = 'gray';
    const BROWN = 'brown';

    public static function getAll() {
        return [
            self::BLACK,
            self::WHITE,
            self::GRAY,
            self::BROWN
        ];
    }
}