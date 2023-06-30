<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserPermission;
use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $superAdmin = Role::firstOrCreate(['name' => UserRole::SuperAdmin]);
        $admin = Role::firstOrCreate(['name' => UserRole::Admin]);
        $instructor = Role::firstOrCreate(['name' => UserRole::Instructor]);
        $student = Role::firstOrCreate(['name' => UserRole::Student]);

        foreach (UserPermission::getValues() as $permissionName) {
            Permission::findOrCreate($permissionName);
        }

        $superAdmin->syncPermissions(Permission::all());
        $admin->syncPermissions(Permission::all());
        $instructor->syncPermissions(
            UserPermission::ReadCategories,
            UserPermission::ReadCourses,
            UserPermission::CreateCourses,
            UserPermission::UpdateCourses,
            UserPermission::DeleteCourses,
            UserPermission::LearnCourses,
        );
        $student->syncPermissions(
            UserPermission::LearnCourses,
        );

        $user = User::firstOrCreate([
            'id' => 1,
        ], [
            'name' => 'Super Admin',
            'email' => 'super.admin@gmail.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(),
        ]);

        $user->syncRoles(UserRole::SuperAdmin);
    }
}
