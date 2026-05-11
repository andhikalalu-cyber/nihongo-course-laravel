<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TentangController extends Controller
{
public function index()
    {
        // Cache instructors for 30 minutes to improve performance
        $instructors = Cache::remember('instructors_list', 30, function () {
            return \App\Models\AboutPage::all();
        });

        return view('tentang', compact('instructors'));
    }
}
