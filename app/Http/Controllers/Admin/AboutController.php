<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $instructors = AboutPage::all();
        return view('admin.about', compact('instructors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|url',
        ]);

        AboutPage::create($request->all());

        return redirect()->route('admin.about.index')->with('success', 'Instruktur baru ditambahkan');
    }

    public function update(Request $request, AboutPage $aboutPage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|url',
        ]);

        $aboutPage->update($request->all());

        return redirect()->route('admin.about.index')->with('success', 'Instruktur diupdate');
    }

    public function destroy(AboutPage $aboutPage)
    {
        $aboutPage->delete();

        return redirect()->route('admin.about.index')->with('success', 'Instruktur dihapus');
    }
}

