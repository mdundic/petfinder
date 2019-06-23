<?php

namespace App\Repositories;

use App\Models\LostPet;
use Illuminate\Pagination\LengthAwarePaginator;
use Faker\Provider\tr_TR\DateTime;

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
        $this->lostPet->user_id = $data['user_id'];

        $this->lostPet->save();
    }

    /**
     * Search lost pet.
     *
     * @param array $searchParams
     * @return LengthAwarePaginator
     */
    public function search(array $searchParams) : LengthAwarePaginator
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

        if (isset($searchParams['found_at'])) {
            $query->where('lost_at', '<=', $searchParams['found_at']);
        }

        return $query->orderBy('lost_at','desc')->paginate(config('search.resultsPerPage'));
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
}
