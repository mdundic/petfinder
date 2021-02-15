<?php

namespace App\Repositories;

use App\Models\AdminUser;
use Illuminate\Database\Eloquent\Collection;

class AdminUserRepository
{

    protected $adminUser;

    /**
     * @param AdminUser $adminUser
     */
    public function __construct(AdminUser $adminUser)
    {
        $this->adminUser = $adminUser;
    }

    /**
     * Create a user
     *
     * @param array $data
     *
     * @return null
     */
    public function create(array $data)
    {
        $this->adminUser->create($data);
    }

    /**
     * Update a user
     *
     * @param AdminUser $adminUser
     * @param array $data
     *
     * @return null
     */
    public function update(AdminUser $adminUser, array $data)
    {
        $adminUser->update($data);
    }

    /**
     * Get the list of users
     *
     * @return Collection
     */
    public function getAll() : Collection
    {
        return $this->adminUser->all();
    }

    /**
     * Get user by id
     *
     * @param int $id
     *
     * @return AdminUser
     */
    public function getById(int $id) : AdminUser
    {
        return $this->adminUser->findOrFail($id);
    }

    /**
     * Soft delete a user
     *
     * @param AdminUser $adminUser
     *
     * @return null
     */
    public function delete(AdminUser $adminUser)
    {
        $adminUser->delete();
    }
}
