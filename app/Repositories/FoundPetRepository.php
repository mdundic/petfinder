<?php

namespace App\Repositories;

use App\Models\FoundPet;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class FoundPetRepository
{
    protected $foundPet;

    /**
     * Create a new repository instance.
     *
     * @return void
     */
    public function __construct(FoundPet $foundPet) {
        $this->foundPet = $foundPet;
    }

    /**
     * Add found pet.
     *
     * @param array $data
     * @return void
     */
    public function add(array $data) : void
    {
        $this->foundPet->name = $data['name'];
        $this->foundPet->type = $data['type'];
        $this->foundPet->breed = $data['breed'];
        $this->foundPet->picture = $data['picture'];
        $this->foundPet->location = $data['location'];
        $this->foundPet->color = $data['color'];
        $this->foundPet->size = $data['size'];
        $this->foundPet->description = $data['description'];
        $this->foundPet->found_at = $data['found_at'];
        $this->foundPet->contact_phone = $data['contact_phone'];

        $this->foundPet->save();
    }

    /**
     * Search found pet.
     *
     * @param array $searchParams
     * @return Collection
     */
    public function search(array $searchParams) : Collection
    {
        $query = $this->foundPet->query()
            ->where('is_returned', false)
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

        return $query->orderBy('found_at','desc')->get();
    }

    /**
     * Get found pet by id.
     *
     * @param integer $id
     * @return FoundPet
     */
    public function get(int $id) : FoundPet
    {
        return $this->foundPet->findOrFail($id);
    }

    /**
     * Return found pet.
     *
     * @param FoundPet $foundPet
     * @return void
     */
    public function return(FoundPet $foundPet) : void
    {
        $foundPet->is_returned = true;
        $foundPet->returned_at = 'now()';

        $foundPet->save();
    }

    /**
     * Approve found pet.
     *
     * @param FoundPet $foundPet
     * @return void
     */
    public function approve(FoundPet $foundPet) : void
    {
        $foundPet->is_published = true;

        $foundPet->save();
    }

    /**
     * Search found pet for admin users
     *
     * @param array $searchParams
     * @return LengthAwarePaginator
     */
    public function adminSearch(array $searchParams) : LengthAwarePaginator
    {
        $query = $this->foundPet->query();

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

        if (isset($searchParams['name'])) {
            $query->where('name', 'LIKE', '%' . $searchParams['name'] . '%');
        }

        if (isset($searchParams['breed'])) {
            $query->where('breed', 'LIKE', '%' . $searchParams['breed'] . '%');
        }

        if (isset($searchParams['contact_phone'])) {
            $query->where('contact_phone', 'LIKE', '%' . $searchParams['contact_phone'] . '%');
        }

        if (isset($searchParams['is_returned'])) {
            $query->where('is_returned', '=', $searchParams['is_returned']);
        }

        if (isset($searchParams['is_published'])) {
            $query->where('is_published', '=', $searchParams['is_published']);
        }

        if (isset($searchParams['date_from'])) {
            $query->where('found_at', '>=', $searchParams['date_from']);
        }

        if (isset($searchParams['date_to'])) {
            $query->where('found_at', '<', $searchParams['date_to']);
        }

        return $query->orderBy('found_at','desc')->paginate(config('search.resultsPerPage'));
    }
}
