<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class KursusController extends Controller
{
public function index()
    {
        // Cache courses for 30 minutes to improve performance
        $courses = Cache::remember('courses_list', 30, function () {
            return \App\Models\Course::orderBy('level')->get();
        });

        return view('kursus', compact('courses'));
    }
}
