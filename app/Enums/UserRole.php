<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserRole extends Enum
{
    const SuperAdmin = 'super-admin';

    const Admin = 'admin';

    const Instructor = 'instructor';

    const Student = 'student';
}
