<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Validators\LostPetValidator;
use App\Repositories\LostPetRepository;
use App\Services\PetService;
use Illuminate\Http\RedirectResponse;

class AdminLostPetsController extends Controller
{
	protected $validator;
    protected $repository;
    protected $service;

    public function __construct(LostPetValidator $validator, LostPetRepository $lostPetRepository, PetService $service)
    {
        $this->validator  = $validator;
        $this->repository = $lostPetRepository;
        $this->service = $service;
    }

    /**
     * Show lost pets list page
     *
     * @return View
     */
    public function index() : View
    {
        return view('admin.lost-pets.index', [
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
        return view('admin.lost-pets.preview', [
            'pet' => $this->repository->get($id)
        ]);
    }

    /**
     * Found lost pet.
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function found(int $id) : RedirectResponse
    {
        $this->service->foundLostPet($id);

        return redirect()->route('admin-lost-pet-preview', $id)->with('status', 'Marked as found!');;
    }

    /**
     * Approve lost pet.
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function approve(int $id) : RedirectResponse
    {
        $this->service->approveLostPet($id);

        return redirect()->route('admin-lost-pet-preview', $id)->with('status', 'Approved!');;
    }
}