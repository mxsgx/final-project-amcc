<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserPermission extends Enum
{
    const ReadUsers = 'users.read';

    const CreateUsers = 'users.create';

    const UpdateUsers = 'users.update';

    const DeleteUsers = 'users.delete';

    const ReadCategories = 'categories.read';

    const CreateCategories = 'categories.create';

    const UpdateCategories = 'categories.update';

    const DeleteCategories = 'categories.delete';

    const ReadCourses = 'courses.read';

    const CreateCourses = 'courses.create';

    const UpdateCourses = 'courses.update';

    const DeleteCourses = 'courses.delete';

    const LearnCourses = 'courses.learn';

    const ReadLectures = 'lectures.read';

    const CreateLectures = 'lectures.create';

    const UpdateLectures = 'lectures.update';

    const DeleteLectures = 'lectures.delete';
}
