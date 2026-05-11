<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TestimoniController extends Controller
{
public function index()
    {
        // Cache testimonials for 30 minutes to improve performance
        $testimonials = Cache::remember('testimonials_list', 30, function () {
            return \App\Models\Testimonial::latest()->take(9)->get();
        });

        return view('testimoni', compact('testimonials'));
    }
}
