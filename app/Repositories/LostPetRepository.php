<?php

namespace App\Repositories;

use App\Models\LostPet;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class LostPetRepository
{
    protected $lostPet;

    /**
     * Create a new repository instance.
     *
     * @return void
     */
    public function __construct(LostPet $lostPet) {
        $this->lostPet = $lostPet;
    }

    /**
     * Add lost pet.
     *
     * @param array $data
     * @return void
     */
    public function add(array $data) : void
    {
        $this->lostPet->name = $data['name'];
        $this->lostPet->type = $data['type'];
        $this->lostPet->breed = $data['breed'];
        $this->lostPet->picture = $data['picture'];
        $this->lostPet->location = $data['location'];
        $this->lostPet->color = $data['color'];
        $this->lostPet->size = $data['size'];
        $this->lostPet->description = $data['description'];
        $this->lostPet->lost_at = $data['lost_at'];
        $this->lostPet->contact_phone = $data['contact_phone'];

        $this->lostPet->save();
    }

    /**
     * Search lost pet.
     *
     * @param array $searchParams
     * @return Collection
     */
    public function search(array $searchParams) : Collection
    {
        $query = $this->lostPet->query()
            ->where('is_found', false)
            ->where('is_published', true);

        if (isset($searchParams['type'])) {
            $query->where('type', '=', $searchParams['type']);
        }

        if (isset($searchParams['color'])) {
            $query->where('color', '=', $searchParams['color']);
        }

        if (isset($searchParams['size'])) {
            $query->where('size', '=', $searchParams['size']);
        }

        if (isset($searchParams['location'])) {
            $query->where('location', '=', $searchParams['location']);
        }

        return $query->orderBy('lost_at','desc')->get();
    }

    /**
     * Get lost pet by id.
     *
     * @param integer $id
     * @return LostPet
     */
    public function get(int $id) : LostPet
    {
        return $this->lostPet->findOrFail($id);
    }

    /**
     * Found lost pet.
     *
     * @param LostPet $lostPet
     * @return void
     */
    public function found(LostPet $lostPet) : void
    {
        $lostPet->is_found = true;
        $lostPet->found_at = 'now()';

        $lostPet->save();
    }

    /**
     * Get the list of lost pets
     *
     * @return Collection
     */
    public function getAll() : Collection
    {
        return $this->lostPet->all();
    }

    /**
     * Approve lost pet.
     *
     * @param LostPet $lostPet
     * @return void
     */
    public function approve(LostPet $lostPet) : void
    {
        $lostPet->is_published = true;

        $lostPet->save();
    }

    /**
     * Search lost pet for admin users
     *
     * @param array $searchParams
     * @return LengthAwarePaginator
     */
    public function adminSearch(array $searchParams) : LengthAwarePaginator
    {
        $query = $this->lostPet->query();

        if (isset($searchParams['type'])) {
            $query->where('type', '=', $searchParams['type']);
        }

        if (isset($searchParams['color'])) {
            $query->where('color', '=', $searchParams['color']);
        }

        if (isset($searchParams['size'])) {
            $query->where('size', '=', $searchParams['size']);
        }

        if (isset($searchParams['location'])) {
            $query->where('location', '=', $searchParams['location']);
        }

        if (isset($searchParams['found_at'])) {
            $query->where('lost_at', '<=', $searchParams['found_at']);
        }

        if (isset($searchParams['name'])) {
            $query->where('name', 'LIKE', '%' . $searchParams['name'] . '%');
        }

        if (isset($searchParams['breed'])) {
            $query->where('breed', 'LIKE', '%' . $searchParams['breed'] . '%');
        }

        if (isset($searchParams['contact_phone'])) {
            $query->where('contact_phone', 'LIKE', '%' . $searchParams['contact_phone'] . '%');
        }

        if (isset($searchParams['is_found'])) {
            $query->where('is_found', '=', $searchParams['is_found']);
        }

        if (isset($searchParams['is_published'])) {
            $query->where('is_published', '=', $searchParams['is_published']);
        }

        if (isset($searchParams['date_from'])) {
            $query->where('lost_at', '>=', $searchParams['date_from']);
        }

        if (isset($searchParams['date_to'])) {
            $query->where('lost_at', '<', $searchParams['date_to']);
        }

        return $query->orderBy('lost_at','desc')->paginate(config('search.resultsPerPage'));
    }
}
