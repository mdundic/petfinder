<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\RedirectResponse;

class AdminAuthController extends Controller
{
    protected $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Show admin index page
     *
     * @return View
     */
    public function index() : View
    {
        return view('admin.index');
    }

    /**
     * Show login page
     *
     * @return mixed
     */
    public function login()
    {
        if ($this->auth->check()) {
            return redirect()->route('admin-index');
        }

        return view('admin.auth.login');
    }

    /**
     * Submmit login page
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function doLogin(Request $request) : RedirectResponse
    {
        if ($this->auth->attempt($request->only('email', 'password'))) {
            return redirect('/admin');
        }

        return redirect()->route('admin-login')->with('error', trans('auth.invalid_login'));
    }

    /**
     * Logout user
     *
     * @return RedirectResponse
     */
    public function logout() : RedirectResponse
    {
        $this->auth->logout();

        return redirect()->route('admin-login');
    }
}
