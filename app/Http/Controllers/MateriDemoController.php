<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriDemoController extends Controller
{
    public function index()
    {
        return view('materi-demo');
    }
}
