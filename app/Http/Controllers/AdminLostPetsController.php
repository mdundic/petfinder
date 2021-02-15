<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Validators\LostPetValidator;
use App\Repositories\LostPetRepository;
use Illuminate\Http\RedirectResponse;

class AdminLostPetsController extends Controller
{
	protected $validator;
    protected $repository;

    public function __construct(LostPetValidator $validator, LostPetRepository $lostPetRepository)
    {
        $this->validator  = $validator;
        $this->repository = $lostPetRepository;
    }

    /**
     * Show lost pets list page
     *
     * @return View
     */
    public function index() : View
    {
        return view('admin.pets.index', [
            'lost_pets' => $this->repository->getAll()
        ]);
    }

    /**
     * Show pet details page
     *
     * @param int $id
     *
     * @return View
     */
    public function preview(int $id) : View
    {
        return view('admin.pets.preview', [
            'pet' => $this->repository->get($id)
        ]);
    }
}
