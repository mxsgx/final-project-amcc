<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Instructor\CreateLectureRequest;
use App\Http\Requests\Instructor\UpdateLectureRequest;
use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function showIndexPage()
    {
        return view('instructor.lectures.index');
    }

    public function create(CreateLectureRequest $request, Course $course)
    {
        $lecture = $course->lectures()->create($request->safe()->toArray());

        if ($request->user()->can('update', $lecture)) {
            return to_route('instructor.courses.lectures.edit', compact('course', 'lecture'));
        } elseif ($request->user()->can('viewAny', Lecture::class)) {
            return to_route('instructor.courses.lectures.index', compact('course'));
        }

        return to_route('root');
    }

    public function showCreatePage()
    {
        return view('instructor.lectures.create');
    }

    public function update(UpdateLectureRequest $request, Course $course, Lecture $lecture)
    {
        $lecture->update($request->safe()->toArray());

        return to_route('instructor.courses.lectures.edit', compact('course', 'lecture'));
    }

    public function showEditPage(Course $course, Lecture $lecture)
    {
        return view('instructor.lectures.edit', compact('course', 'lecture'));
    }

    public function delete(Request $request, Course $course, Lecture $lecture)
    {
        $lecture->forceDelete();

        if ($request->user()->can('viewAny', Lecture::class)) {
            return to_route('instructor.courses.lectures.index', compact('course'));
        }

        return to_route('root');
    }
}
