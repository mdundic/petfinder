<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\FoundPetValidator;
use App\Repositories\FoundPetRepository;
use App\Services\PetService;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Collection;

class FoundPetController extends Controller
{
    protected $validator;
    protected $foundPetRepository;
    protected $petService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        FoundPetValidator $validator,
        FoundPetRepository $foundPetRepository,
        PetService $petService
    ) {
        $this->validator = $validator;
        $this->foundPetRepository = $foundPetRepository;
        $this->petService = $petService;
    }

    /**
     * Add found pet.
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
            $this->foundPetRepository->add($params);
        } catch (Exception $e) {
            Storage::delete($params['picture']);

            return response(null, 500);
        }

        return response(null, 201);
    }

    /**
     * Search found pet.
     *
     * @param Request $request
     * @return Collection
     */
    public function search(Request $request) : Collection
    {
        $this->validator->validateSearch($request);

        return $this->foundPetRepository->search($request->all());
    }

    /**
     * Return Found pet.
     *
     * @param integer $id
     * @return Response
     */
    public function returned(int $id) : Response
    {
        $this->petService->returnFoundPet($id);

        return response(null, 204);
    }
}
