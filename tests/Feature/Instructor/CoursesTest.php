<?php

namespace Tests\Feature\Instructor;

use App\Enums\CourseUserRelation;
use App\Enums\UserPermission;
use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CoursesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_authorized_users_can_visit_courses_page(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::ReadCourses);

        $response = $this->actingAs($user)->get(route('instructor.courses.index'));

        $response->assertOk();
        $response->assertViewIs('instructor.courses.index');
    }

    public function test_authorized_users_can_visit_create_course_page(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::CreateCourses);

        $response = $this->actingAs($user)->get(route('instructor.courses.create'));

        $response->assertOk();
        $response->assertViewIs('instructor.courses.create');
    }

    public function test_authorized_users_can_create_course(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::CreateCourses);

        $title = $this->faker->title();
        $response = $this->actingAs($user)->post(route('instructor.courses.store'), [
            'title' => $title,
            'subtitle' => $this->faker->title,
            'description' => $this->faker->sentence,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas(Course::getModel()->getTable(), [
            'title' => $title,
        ]);
    }

    public function test_authorized_users_can_visit_edit_course_page(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::UpdateCourses);

        $course = Course::factory()->hasAttached($user, ['relation' => CourseUserRelation::Instructor], 'instructors')->createOne();
        $response = $this->actingAs($user)->get(route('instructor.courses.edit', compact('course')));

        $response->assertOk();
        $response->assertViewIs('instructor.courses.edit');
    }

    public function test_authorized_users_can_update_course(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::UpdateCourses);

        $course = Course::factory()->hasAttached($user, ['relation' => CourseUserRelation::Instructor], 'instructors')->createOne();
        $title = $this->faker->title();
        $response = $this->actingAs($user)->patch(route('instructor.courses.update', compact('course')), [
            'title' => $title,
            'subtitle' => $course->subtitle,
            'description' => $course->description,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas(Course::getModel()->getTable(), [
            'title' => $title,
        ]);
    }

    public function test_authorized_users_can_delete_course(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::DeleteCourses);

        $course = Course::factory()->hasAttached($user, ['relation' => CourseUserRelation::Instructor], 'instructors')->createOne();
        $response = $this->actingAs($user)->delete(route('instructor.courses.delete', compact('course')));

        $response->assertRedirect();
        $this->assertModelMissing($course);
    }
}
