<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
public function index()
    {
        $courses = \App\Models\Course::all();
        $testimonials = \App\Models\Testimonial::all();
        $instructors = \App\Models\AboutPage::all();
        return view('admin.dashboard', compact('courses', 'testimonials', 'instructors'));
    }

    public function courses()
    {
        $courses = \App\Models\Course::all();
        return view('admin.courses', compact('courses'));
    }

    public function testimonials()
    {
        $testimonials = \App\Models\Testimonial::all();
        return view('admin.testimonials', compact('testimonials'));
    }
}
