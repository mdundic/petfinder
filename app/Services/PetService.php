<?php

namespace App\Services;

use App\Repositories\LostPetRepository;
use App\Repositories\FoundPetRepository;
use App\Exceptions\PetAlreadyFoundException;
use App\Exceptions\PetAlreadyApprovedException;
use App\Exceptions\PetAlreadyReturnedException;


class PetService
{
    protected $lostPetRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LostPetRepository $lostPetRepository, FoundPetRepository $foundPetRepository)
    {
        $this->lostPetRepository = $lostPetRepository;
        $this->foundPetRepository = $foundPetRepository;
    }

    /**
     * Found lost pet. Pet can be found only once.
     *
     * @param integer $lostPetId
     * @return void
     */
    public function foundLostPet(int $lostPetId) : void
    {
        $pet = $this->lostPetRepository->get($lostPetId);

        if($pet->is_found) {
            throw new PetAlreadyFoundException;
        }

        $this->lostPetRepository->found($pet);
    }

    /**
     * Reurn found pet. Pet can be returned only once.
     *
     * @param integer $lostPetId
     * @return void
     */
    public function returnFoundPet(int $foundPetId) : void
    {
        $pet = $this->foundPetRepository->get($foundPetId);

        if($pet->is_returned) {
            throw new PetAlreadyReturnedException;
        }

        $this->foundPetRepository->return($pet);
    }

    /**
     * Approve lost pet. Pet can be approved only once.
     *
     * @param integer $lostPetId
     * @return void
     */
    public function approveLostPet(int $lostPetId) : void
    {
        $pet = $this->lostPetRepository->get($lostPetId);

        if($pet->is_published) {
            throw new PetAlreadyApprovedException;
        }

        $this->lostPetRepository->approve($pet);
    }

    /**
     * Approve found pet. Pet can be approved only once.
     *
     * @param integer $foundPetId
     * @return void
     */
    public function approveFoundPet(int $foundPetId) : void
    {
        $pet = $this->foundPetRepository->get($foundPetId);

        if($pet->is_published) {
            throw new PetAlreadyApprovedException;
        }

        $this->foundPetRepository->approve($pet);
    }
}
