<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class PetAlreadyReturnedException extends HttpException
{
    const STATUS_CODE = 400;
    const MESSAGE = 'This pet has already been returned.';

    /**
     * Create a new PetAlreadyFoundException instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct(self::STATUS_CODE, self::MESSAGE);
    }
}
