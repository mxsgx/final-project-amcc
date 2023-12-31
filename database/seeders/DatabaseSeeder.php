<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\CourseUserRelation;
use App\Enums\UserPermission;
use App\Enums\UserRole;
use App\Models\Category;
use App\Models\Course;
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

        $superAdminUser = User::firstOrCreate([
            'id' => 1,
        ], [
            'name' => 'Super Admin',
            'email' => 'super.admin@mahaakses.id',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(),
        ]);

        $superAdminUser->syncRoles(UserRole::SuperAdmin);

        $adminUser = User::firstOrCreate([
            'id' => 2,
        ], [
            'name' => 'Admin',
            'email' => 'admin@mahaakses.id',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(),
        ]);

        $adminUser->syncRoles(UserRole::Admin);

        $categories = [
            [
                'name' => 'HTML',
                'slug' => 'html',
            ],
            [
                'name' => 'CSS',
                'slug' => 'css',
            ],
            [
                'name' => 'JavaScript',
                'slug' => 'javascript',
            ],
            [
                'name' => 'PHP',
                'slug' => 'php',
            ],
        ];
        foreach ($categories as $category) {
            Category::firstOrCreate([
                'slug' => $category['slug'],
            ], $category);
        }

        User::factory(100)->afterCreating(function (User $user) {
            $user->assignRole(UserRole::Instructor);
        })->hasAttached(Course::factory(25)->hasAttached(Category::factory(1), relationship: 'categories')->hasLectures(8), ['relation' => CourseUserRelation::Instructor], 'teachingCourses')->create();
    }
}
