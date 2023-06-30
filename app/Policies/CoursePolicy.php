<?php

namespace App\Policies;

use App\Enums\UserPermission;
use App\Models\Course;
use App\Models\User;

class CoursePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo(UserPermission::ReadCourses);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo(UserPermission::CreateCourses);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Course $course): bool
    {
        return $user->hasPermissionTo(UserPermission::UpdateCourses) && $course->instructors->contains('id', '=', $user->id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Course $course): bool
    {
        return $user->hasPermissionTo(UserPermission::DeleteCourses) && $course->instructors->contains('id', '=', $user->id);
    }

    public function enroll(User $user, Course $course): bool
    {
        return $user->hasPermissionTo(UserPermission::LearnCourses) && $user->learningCourses->doesntContain('id', '=', $course->id);
    }

    public function learn(User $user, Course $course): bool
    {
        return $user->hasPermissionTo(UserPermission::LearnCourses) && $user->learningCourses->contains('id', '=', $course->id);
    }
}
