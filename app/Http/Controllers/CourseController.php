<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseController extends Controller
{
    public function showIndexPage()
    {
        return view('courses.index');
    }

    public function showViewPage(Course $course)
    {
        return view('courses.view', compact('course'));
    }
}
