<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseController extends Controller
{
    public function showIndexPage()
    {
        $courses = Course::paginate(10);

        return view('courses.index', compact('courses'));
    }

    public function showViewPage(Course $course)
    {
        return view('courses.view', compact('course'));
    }
}
