<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class PetDoesntBelongToUserException extends HttpException
{
    const STATUS_CODE = 400;
    const MESSAGE = "This pet doesn't belong to you.";

    /**
     * Create a new PetDoesntBelongToUserException instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct(self::STATUS_CODE, self::MESSAGE);
    }
}
