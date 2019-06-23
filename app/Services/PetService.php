<?php

namespace App\Services;

use App\Repositories\LostPetRepository;
use App\Exceptions\PetAlreadyFoundException;

class PetService
{
    protected $lostPetRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LostPetRepository $lostPetRepository)
    {
        $this->lostPetRepository = $lostPetRepository;
    }

    /**
     * Found lost pet. Pet can be found only once.
     *
     * @param integer $lostPetId
     * @return void
     * @throws PetAlreadyFoundException
     */
    public function foundLostPet(int $lostPetId) : void
    {
        $pet = $this->lostPetRepository->get($lostPetId);

        if($pet->is_found) {
            throw new PetAlreadyFoundException;
        }

        $this->lostPetRepository->found($pet);
    }
}
