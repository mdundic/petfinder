<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Validators\FoundPetValidator;
use App\Repositories\FoundPetRepository;
use App\Services\PetService;
use Illuminate\Http\RedirectResponse;

class AdminFoundPetsController extends Controller
{
	protected $validator;
    protected $repository;
    protected $service;

    public function __construct(FoundPetValidator $validator, FoundPetRepository $foundPetRepository, PetService $service)
    {
        $this->validator  = $validator;
        $this->repository = $foundPetRepository;
        $this->service = $service;
    }

    /**
     * Show found pets list page
     *
     * @return View
     */
    public function index(Request $request) : View
    {
        $searchParams = array_filter($request->only(
            'is_published',
            'type',
            'name',
            'breed',
            'color',
            'size',
            'location',
            'contact_phone',
            'is_returned',
            'date_from',
            'date_to',
        ));

        if (isset($searchParams['date_from'])) {
            $searchParams['date_from'] = format_date_en($searchParams['date_from']);
        }

        if (isset($searchParams['date_to'])) {
            $searchParams['date_to'] = format_date_en($searchParams['date_to']);
        }

        $pets = $this->repository->adminSearch($searchParams);

        return view('admin.found-pets.index', [
            'pets' => $pets,
            'searchParams' => $searchParams
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
        return view('admin.found-pets.preview', [
            'pet' => $this->repository->get($id)
        ]);
    }

    /**
     * Return found pet.
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function return(int $id) : RedirectResponse
    {
        $this->service->returnFoundPet($id);

        return redirect()->route('admin-found-pet-preview', $id)->with('status', 'Marked as returned!');;
    }

    /**
     * Approve found pet.
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function approve(int $id) : RedirectResponse
    {
        $this->service->approveFoundPet($id);

        return redirect()->route('admin-found-pet-preview', $id)->with('status', 'Approved!');;
    }
}
