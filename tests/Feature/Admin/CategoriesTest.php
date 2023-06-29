<?php

namespace Tests\Feature\Admin;

use App\Enums\UserPermission;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_authorized_users_can_visit_categories_page(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::ReadCategories);

        $response = $this->actingAs($user)->get(route('admin.categories.index'));

        $response->assertOk();
        $response->assertViewIs('admin.categories.index');
    }

    public function test_authorized_users_can_visit_create_category_page(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::CreateCategories);

        $response = $this->actingAs($user)->get(route('admin.categories.create'));

        $response->assertOk();
        $response->assertViewIs('admin.categories.create');
    }

    public function test_authorized_users_can_create_category(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::CreateCategories);

        $slug = $this->faker->slug();
        $response = $this->actingAs($user)->post(route('admin.categories.store'), [
            'name' => $this->faker->name,
            'slug' => $slug,
            'description' => $this->faker->sentence,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas(Category::getModel()->getTable(), [
            'slug' => $slug,
        ]);

        $name = $this->faker->name();
        $response = $this->actingAs($user)->post(route('admin.categories.store'), [
            'name' => $name,
            'slug' => null,
            'description' => $this->faker->sentence,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas(Category::getModel()->getTable(), [
            'slug' => Str::slug($name),
        ]);
    }

    public function test_authorized_users_can_visit_edit_category_page(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::UpdateCategories);

        $category = Category::factory()->createOne();
        $response = $this->actingAs($user)->get(route('admin.categories.edit', compact('category')));

        $response->assertOk();
        $response->assertViewIs('admin.categories.edit');
    }

    public function test_authorized_users_can_update_category(): void
    {
        $user = User::factory()->createOne();
        $toBeUpdatedCategory = Category::factory()->createOne();

        $user->givePermissionTo(UserPermission::UpdateCategories);

        $slug = $this->faker->slug();
        $response = $this->actingAs($user)->patch(route('admin.categories.update', ['category' => $toBeUpdatedCategory]), [
            'name' => $this->faker->name,
            'slug' => $slug,
            'description' => $this->faker->sentence,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas(Category::getModel()->getTable(), [
            'slug' => $slug,
        ]);
    }

    public function test_authorized_users_can_delete_category(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::DeleteCategories);

        $toBeDeletedCategory = Category::factory()->createOne();
        $response = $this->actingAs($user)->delete(route('admin.categories.delete', ['category' => $toBeDeletedCategory]));

        $response->assertRedirect();
        $this->assertModelMissing($toBeDeletedCategory);
    }
}
