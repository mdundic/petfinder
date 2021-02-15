<?php

namespace App\Validators;

use Illuminate\Http\Request;
use App\Constants\AdminUserRoles;
use App\Rules\AlphaWithSpaces;

class AdminUserValidator
{
    /**
     * Validate create user params
     *
     * @param Request $request
     *
     * @return null
     */
    public function validateCreate(Request $request)
    {
        $request->validate([
            'first_name' => [
                'required',
                new AlphaWithSpaces
            ],
            'last_name' => [
                'required',
                new AlphaWithSpaces
            ],
            'email' => 'required|email|unique:admin_users',
            'password' => 'required|min:6',
            'role' => 'required|in:' . implode(',', AdminUserRoles::toArray())
        ]);
    }

    /**
     * Validate update user params
     *
     * @param Request $request
     * @param int $id
     *
     * @return null
     */
    public function validateUpdate(Request $request, int $id)
    {
        $request->validate([
            'first_name' => [
                'required',
                new AlphaWithSpaces
            ],
            'last_name' => [
                'required',
                new AlphaWithSpaces
            ],
            'email' => 'required|email|unique:admin_users,email,' . $id,
            'password' => 'sometimes|nullable|min:6',
            'role' => 'required|in:' . implode(',', AdminUserRoles::toArray())
        ]);
    }
}
