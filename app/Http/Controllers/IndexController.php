<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Constants\PetColor;
use App\Constants\PetSize;
use App\Constants\PetType;
use App\Constants\Location;

class IndexController extends Controller
{

    /**
     * Show index page
     *
     * @return View
     */
    public function home() : View
    {
        return view('home', [
            'pet_colors' => PetColor::getAll(),
            'pet_sizes' => PetSize::getAll(),
            'pet_types' => PetType::getAll(),
            'locations' => Location::getAll()
        ]);
    }
}
