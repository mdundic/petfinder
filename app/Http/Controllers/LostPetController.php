<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\LostPetValidator;
use App\Repositories\LostPetRepository;
use App\Services\PetService;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Collection;

class LostPetController extends Controller
{
    protected $validator;
    protected $lostPetRepository;
    protected $petService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        LostPetValidator $validator,
        LostPetRepository $lostPetRepository,
        PetService $petService
    ) {
        $this->validator = $validator;
        $this->lostPetRepository = $lostPetRepository;
        $this->petService = $petService;
    }

    /**
     * Add lost pet.
     *
     * @param Request $request
     * @return Response
     */
    public function add(Request $request) : Response
    {
        $this->validator->validateAdd($request);

        $params = $request->all();

        $params['picture'] = $request->file('picture')->store('');

        try {
            $this->lostPetRepository->add($params);
        } catch (Exception $e) {
            Storage::delete($params['picture']);

            return response(null, 500);
        }

        return response(null, 201);
    }

    /**
     * Search lost pet.
     *
     * @param Request $request
     * @return Collection
     */
    public function search(Request $request) : Collection
    {
        $this->validator->validateSearch($request);

        return $this->lostPetRepository->search($request->all());
    }
}
