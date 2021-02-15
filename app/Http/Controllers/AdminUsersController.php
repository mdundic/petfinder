<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Validators\AdminUserValidator;
use Illuminate\Http\RedirectResponse;
use App\Repositories\AdminUserRepository;

class AdminUsersController extends Controller
{
    protected $validator;
    protected $repository;

    public function __construct(AdminUserValidator $validator, AdminUserRepository $adminUserRepository)
    {
        $this->validator  = $validator;
        $this->repository = $adminUserRepository;
    }

    /**
     * Show user list page
     *
     * @return View
     */
    public function index() : View
    {
        return view('admin.users.index', [
            'users' => $this->repository->getAll()
        ]);
    }

    /**
     * Show create user page
     *
     * @return View
     */
    public function create() : View
    {
        return view('admin.users.create');
    }

    /**
     * Create user
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function doCreate(Request $request) : RedirectResponse
    {
        $this->validator->validateCreate($request);

        $this->repository->create($request->all());

        return redirect()->route('admin-user-list')->with('success', trans('global.message.success_update'));
    }

    /**
     * Show update user page
     *
     * @param int $id
     *
     * @return View
     */
    public function update(int $id) : View
    {
        return view('admin.users.update', [
            'user' => $this->repository->getById($id)
        ]);
    }

    /**
     * Update user
     *
     * @param Request $request
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function doUpdate(Request $request, int $id) : RedirectResponse
    {
        $this->validator->validateUpdate($request, $id);

        $user = $this->repository->getById($id);

        $this->repository->update($user, array_filter($request->all()));

        return redirect()->route('admin-user-list')->with('success', trans('global.message.success_update'));
    }

    /**
     * Delete user
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function delete(int $id) : RedirectResponse
    {
        $user = $this->repository->getById($id);

        $this->repository->delete($user);

        return redirect()->route('admin-user-list')->with('success', trans('global.message.success_delete'));
    }
}
