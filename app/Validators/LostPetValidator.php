<?php

namespace App\Validators;

use Illuminate\Http\Request;
use App\Constants\PetType;
use App\Constants\PetSize;
use App\Constants\PetColor;
use App\Constants\Location;
use App\Rules\AlphaWithSpaces;

class LostPetValidator
{
    /**
     * Validate user
     *
     * @param Request $request
     *
     * @return null
     */
    public function validateLostPet(Request $request)
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
            'picture'  => 'required|string',
            'color'  => 'required|in:' . implode(',', PetColor::getAll()),
            'location'  => 'required|in:' . implode(',', Location::getAll()),
            'description'  => 'string'
        ]);
    }
}
