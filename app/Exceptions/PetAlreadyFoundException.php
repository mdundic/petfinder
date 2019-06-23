<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class PetAlreadyFoundException extends HttpException
{
    const STATUS_CODE = 400;
    const MESSAGE = 'This pet has already been found.';

    /**
     * Create a new PetAlreadyFoundException instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct(self::STATUS_CODE, self::MESSAGE);
    }
}
