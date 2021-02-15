<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthManager;

class Authenticate
{
    protected $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->auth->check()) {
            return redirect()->route('admin-login');
        }

        $allowedRoutes = config('acl.' . $this->auth->user()->role);

        if (!in_array($request->route()->getName(), $allowedRoutes)) {
            die(trans('auth.no_permission'));
        }

        return $next($request);
    }
}
