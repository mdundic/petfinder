<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Validators\LostPetValidator;
use App\Repositories\LostPetRepository;

class LostPetController extends Controller
{

    protected $validator;
    protected $lostPetRepository;

    public function __construct(LostPetValidator $validator, LostPetRepository $lostPetRepository)
    {
        $this->validator = $validator;
        $this->lostPetRepository = $lostPetRepository;
    }

    public function add(Request $request)
    {
        $this->validator->validateLostPet($request);

        $this->lostPetRepository->add($request->getAll());

        // return response()->json('success', 201);

    }
}
