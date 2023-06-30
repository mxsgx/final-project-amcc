<?php

namespace Tests\Feature\Instructor;

use App\Enums\CourseUserRelation;
use App\Enums\UserPermission;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LecturesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_authorized_users_can_visit_lectures_page(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::ReadLectures);

        $course = Course::factory()->hasAttached($user, ['relation' => CourseUserRelation::Instructor], 'instructors')->createOne();
        $response = $this->actingAs($user)->get(route('instructor.courses.lectures.index', compact('course')));

        $response->assertOk();
        $response->assertViewIs('instructor.lectures.index');
    }

    public function test_authorized_users_can_visit_create_lecture_page(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::CreateLectures);

        $course = Course::factory()->hasAttached($user, ['relation' => CourseUserRelation::Instructor], 'instructors')->createOne();
        $response = $this->actingAs($user)->get(route('instructor.courses.lectures.create', compact('course')));

        $response->assertOk();
        $response->assertViewIs('instructor.lectures.create');
    }

    public function test_authorized_users_can_create_lecture(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::CreateLectures);

        $course = Course::factory()->hasAttached($user, ['relation' => CourseUserRelation::Instructor], 'instructors')->createOne();
        $title = $this->faker->title();
        $response = $this->actingAs($user)->post(route('instructor.courses.lectures.store', compact('course')), [
            'title' => $title,
            'summary' => $this->faker->sentence,
            'content' => $this->faker->sentence,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas(Lecture::getModel()->getTable(), [
            'title' => $title,
        ]);
    }

    public function test_authorized_users_can_visit_edit_lecture_page(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::UpdateCourses, UserPermission::UpdateLectures);

        $course = Course::factory()->hasAttached($user, ['relation' => CourseUserRelation::Instructor], 'instructors')->createOne();
        $lecture = Lecture::factory()->for($course)->createOne();
        $response = $this->actingAs($user)->get(route('instructor.courses.lectures.edit', compact('course', 'lecture')));

        $response->assertOk();
        $response->assertViewIs('instructor.lectures.edit');
    }

    public function test_authorized_users_can_update_lecture(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::UpdateLectures);

        $course = Course::factory()->hasAttached($user, ['relation' => CourseUserRelation::Instructor], 'instructors')->createOne();
        $lecture = Lecture::factory()->for($course)->createOne();
        $title = $this->faker->title();
        $response = $this->actingAs($user)->patch(route('instructor.courses.lectures.update', compact('course', 'lecture')), [
            'title' => $title,
            'summary' => $this->faker->sentence,
            'content' => $this->faker->sentence,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas(Lecture::getModel()->getTable(), [
            'title' => $title,
        ]);
    }

    public function test_authorized_users_can_delete_lecture(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::DeleteLectures);

        $course = Course::factory()->hasAttached($user, ['relation' => CourseUserRelation::Instructor], 'instructors')->createOne();
        $lecture = Lecture::factory()->for($course)->createOne();
        $response = $this->actingAs($user)->delete(route('instructor.courses.lectures.delete', compact('course', 'lecture')));

        $response->assertRedirect();
        $this->assertModelMissing($lecture);
    }
}
