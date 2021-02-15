<?php

namespace App\Constants;

class AdminUserRoles
{
    const ADMIN = 'admin';
    const MODERATOR = 'moderator';

    public static function toArray() : array
    {
        return [
            self::ADMIN,
            self::MODERATOR
        ];
    }
}
