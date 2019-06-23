<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\LostPetValidator;
use App\Repositories\LostPetRepository;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class LostPetController extends Controller
{
    protected $validator;
    protected $lostPetRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LostPetValidator $validator, LostPetRepository $lostPetRepository)
    {
        $this->validator = $validator;
        $this->lostPetRepository = $lostPetRepository;
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

        $this->lostPetRepository->add(
            array_merge(
                $request->all(),
                ['user_id' => '1'] //@TODO change with logged user
            )
        );

        return response(null, 201);
    }

    /**
     * Search lost pet.
     *
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function search(Request $request) : LengthAwarePaginator
    {
        $this->validator->validateSearch($request);

        return $this->lostPetRepository->search(
            $request->all()
        );
    }
}
