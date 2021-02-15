<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminLostPetsController extends Controller
{

    /**
     * Show lost pets list page
     *
     * @return View
     */
    public function index() : View
    {
        return view('admin.pets.lost');
    }
}
