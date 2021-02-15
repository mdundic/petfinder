<?php

namespace App\Repositories;

use App\Models\FoundPet;
use Illuminate\Database\Eloquent\Collection;

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

        if (isset($searchParams['found_at'])) {
            $query->where('found_at', '<=', $searchParams['found_at']);
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
     * Found found pet.
     *
     * @param FoundPet $foundPet
     * @return void
     */
    public function returned(FoundPet $foundPet) : void
    {
        $foundPet->is_returned = true;
        $foundPet->returned_at = 'now()';

        $foundPet->save();
    }
}
