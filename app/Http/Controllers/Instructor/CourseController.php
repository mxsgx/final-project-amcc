<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Instructor\CreateCourseRequest;
use App\Http\Requests\Instructor\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showIndexPage()
    {
        return view('instructor.courses.index');
    }

    public function create(CreateCourseRequest $request)
    {
        $course = Course::create($request->safe()->toArray());

        $course->instructors()->sync($request->user());

        if ($request->user()->can('update', $course)) {
            return to_route('instructor.courses.edit', compact('course'));
        } elseif ($request->user()->can('viewAny', Course::class)) {
            return to_route('instructor.courses.index');
        }

        return to_route('root');
    }

    public function showCreatePage()
    {
        return view('instructor.courses.create');
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->safe()->toArray());

        return to_route('instructor.courses.edit', compact('course'));
    }

    public function showEditPage(Course $course)
    {
        return view('instructor.courses.edit', compact('course'));
    }

    public function delete(Request $request, Course $course)
    {
        $course->forceDelete();

        if ($request->user()->can('viewAny', Course::class)) {
            return to_route('instructor.courses.index');
        }

        return to_route('root');
    }
}
