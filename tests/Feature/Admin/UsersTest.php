<?php

namespace Tests\Feature\Admin;

use App\Enums\UserPermission;
use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_authorized_users_can_visit_users_page(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::ReadUsers);

        $response = $this->actingAs($user)->get(route('admin.users.index'));

        $response->assertOk();
        $response->assertViewIs('admin.users.index');
    }

    public function test_authorized_users_can_visit_create_user_page(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::CreateUsers);

        $response = $this->actingAs($user)->get(route('admin.users.create'));

        $response->assertOk();
        $response->assertViewIs('admin.users.create');
    }

    public function test_authorized_users_can_create_user(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::CreateUsers);

        $email = $this->faker->email();
        $response = $this->actingAs($user)->post(route('admin.users.store'), array_merge([
            'name' => $this->faker->name,
            'email' => $email,
            'password' => 'password',
            'verified' => $this->faker->boolean,
        ], $this->faker->boolean ? [
            'role' => UserRole::getRandomValue(),
            'permissions' => null,
        ] : [
            'role' => null,
            'permissions' => [UserPermission::getRandomValue()],
        ]));

        $response->assertRedirect();
        $this->assertDatabaseHas(User::getModel()->getTable(), [
            'email' => $email,
        ]);
    }

    public function test_authorized_users_can_visit_edit_user_page(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::UpdateUsers);

        $response = $this->actingAs($user)->get(route('admin.users.edit', compact('user')));

        $response->assertOk();
        $response->assertViewIs('admin.users.edit');
    }

    public function test_authorized_users_can_update_user(): void
    {
        $user = User::factory()->createOne();
        $toBeUpdatedUser = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::UpdateUsers);

        $email = $this->faker->email();
        $response = $this->actingAs($user)->patch(route('admin.users.update', ['user' => $toBeUpdatedUser]), array_merge([
            'name' => $this->faker->name,
            'email' => $email,
            'verified' => $this->faker->boolean,
        ], $this->faker->boolean ? [
            'role' => UserRole::getRandomValue(),
            'permissions' => null,
        ] : [
            'role' => null,
            'permissions' => [UserPermission::getRandomValue()],
        ]));

        $response->assertRedirect();
        $this->assertDatabaseHas(User::getModel()->getTable(), [
            'email' => $email,
        ]);

        $response = $this->actingAs($user)->put(route('admin.users.change-password', ['user' => $toBeUpdatedUser]), [
            'password' => 'new-password',
        ]);

        $response->assertRedirect();
    }

    public function test_authorized_users_can_delete_user(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::DeleteUsers);

        $toBeDeletedUser = User::factory()->createOne();
        $response = $this->actingAs($user)->delete(route('admin.users.delete', ['user' => $toBeDeletedUser]));

        $response->assertRedirect();
        $this->assertModelMissing($toBeDeletedUser);
    }
}
