<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class CourseUserRelation extends Enum
{
    const Instructor = 'instructor';

    const Student = 'student';
}
