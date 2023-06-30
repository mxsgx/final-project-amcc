<?php

namespace App\Http\Controllers\Student;

use App\Enums\CourseUserRelation;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showIndexPage()
    {
        return view('student.courses.index');
    }

    public function enrollCourse(Request $request, Course $course)
    {
        if ($request->user()->learningCourses->doesntContain('id', '=', $course->id)) {
            $request->user()->learningCourses()->attach($course, ['relation' => CourseUserRelation::Student]);
        }

        return to_route('course.view', compact('course'));
    }

    public function startLearningCourse(Course $course)
    {
        $lecture = $course->lectures()->first();

        return to_route('course.learn.lecture', compact('course', 'lecture'));
    }

    public function learnCourse(Course $course, Lecture $lecture)
    {
        return view('student.courses.learn', compact('course', 'lecture'));
    }
}
