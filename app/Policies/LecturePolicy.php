<?php

namespace App\Policies;

use App\Enums\UserPermission;
use App\Models\Lecture;
use App\Models\User;

class LecturePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo(UserPermission::ReadLectures);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo(UserPermission::CreateLectures);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Lecture $lecture): bool
    {
        return $user->hasPermissionTo(UserPermission::UpdateLectures) && $lecture->course->instructors->contains('id', '=', $user->id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Lecture $lecture): bool
    {
        return $user->hasPermissionTo(UserPermission::DeleteLectures) && $lecture->course->instructors->contains('id', '=', $user->id);
    }
}
