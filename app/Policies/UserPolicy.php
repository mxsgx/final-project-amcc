<?php

namespace App\Policies;

use App\Enums\UserPermission;
use App\Enums\UserRole;
use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo(UserPermission::ReadUsers);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo(UserPermission::CreateUsers);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        if ($user->hasRole(UserRole::Admin) && $model->hasRole(UserRole::SuperAdmin)) {
            return false;
        }

        return $user->hasPermissionTo(UserPermission::UpdateUsers) || $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        if ($user->hasRole(UserRole::Admin) && $model->hasRole(UserRole::SuperAdmin)) {
            return false;
        }

        return $user->hasPermissionTo(UserPermission::DeleteUsers) || $user->id === $model->id;
    }
}
