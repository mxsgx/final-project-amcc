<?php

namespace App\Http\Controllers\Instructor;

use App\Enums\CourseUserRelation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Instructor\CreateCourseRequest;
use App\Http\Requests\Instructor\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function showIndexPage(Request $request)
    {
        $courses = Course::whereHas('instructors', function ($query) use ($request) {
            $query->where('user_id', '=', $request->user()->id)
                ->where('relation', '=', CourseUserRelation::Instructor);
        })->cursorPaginate(16);

        return view('instructor.courses.index', compact('courses'));
    }

    public function create(CreateCourseRequest $request)
    {
        $course = Course::create($request->safe()->except('thumbnail'));

        $course->instructors()->sync($request->user());

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->storePublicly('images/courses');
            $course->update([
                'thumbnail' => $path,
            ]);
        }

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

        if ($request->hasFile('thumbnail')) {
            $oldPath = $course->thumbnail;
            $path = $request->file('thumbnail')->storePublicly('images/courses');

            $course->update([
                'thumbnail' => $path,
            ]);

            Storage::delete($oldPath);
        }

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
