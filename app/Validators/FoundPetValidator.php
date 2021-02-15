<?php

namespace App\Validators;

use Illuminate\Http\Request;
use App\Constants\PetType;
use App\Constants\PetSize;
use App\Constants\PetColor;
use App\Constants\Location;
use App\Rules\AlphaWithSpaces;

class FoundPetValidator
{
    /**
     * Validate request data when adding lost pet.
     *
     * @param Request $request
     * @return void
     */
    public function validateAdd(Request $request) : void
    {
        $request->validate([
            'name' => [
                'required',
                new AlphaWithSpaces
            ],
            'type' => 'required|in:' . implode(',', PetType::getAll()),
            'size' => 'required|in:' . implode(',', PetSize::getAll()),
            'breed' => [
                'required',
                new AlphaWithSpaces
            ],
            'picture'  => 'required|image|max:10000',
            'color'  => 'required|in:' . implode(',', PetColor::getAll()),
            'location'  => 'required|in:' . implode(',', Location::getAll()),
            'found_at'  => 'required|date_format:Y-m-d|before:tomorrow',
            'description'  => 'nullable|string',
            'contact_phone'  => 'required|string'
        ]);
    }

    /**
     * Validate request data when searching lost pet.
     *
     * @param Request $request
     * @return void
     */
    public function validateSearch(Request $request) : void
    {
        $request->validate([
            'type' => 'in:' . implode(',', PetType::getAll()),
            'size' => 'in:' . implode(',', PetSize::getAll()),
            'color'  => 'in:' . implode(',', PetColor::getAll()),
            'location'  => 'in:' . implode(',', Location::getAll()),
        ]);
    }
}
