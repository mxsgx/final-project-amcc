<?php

namespace Tests\Feature\Student;

use App\Enums\CourseUserRelation;
use App\Enums\UserPermission;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CoursesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_authorized_users_can_visit_enrolled_course_page(): void
    {
        $user = User::factory()->hasAttached(
            Course::factory()->hasLectures(1),
            relationship: 'learningCourses'
        )->createOne();

        $user->givePermissionTo(UserPermission::LearnCourses);

        $response = $this->actingAs($user)->get(route('my-courses'));

        $response->assertOk();
        $response->assertViewIs('student.courses.index');
    }

    public function test_authorized_users_can_enroll_course(): void
    {
        $user = User::factory()->createOne();

        $user->givePermissionTo(UserPermission::LearnCourses);

        $course = Course::factory()->hasAttached(User::factory(), ['relation' => CourseUserRelation::Instructor], 'instructors')->createOne();
        $response = $this->actingAs($user)->post(route('course.enroll', compact('course')));

        $response->assertRedirect();
        $user->refresh();
        $this->assertTrue($user->learningCourses->contains('id', '=', $course->id));
    }

    public function test_authorized_users_can_learn_enrolled_course(): void
    {
        $course = Course::factory()->hasAttached(User::factory()->createOne(), ['relation' => CourseUserRelation::Instructor], 'instructors')->createOne();
        $lecture = Lecture::factory()->for($course)->createOne();
        $user = User::factory()->hasAttached($course, ['relation' => CourseUserRelation::Student], 'learningCourses')->createOne();

        $user->givePermissionTo(UserPermission::LearnCourses);

        $response = $this->actingAs($user)->get(route('course.learn.lecture', compact('course', 'lecture')));

        $response->assertOk();
        $response->assertViewIs('student.courses.learn');
    }
}
