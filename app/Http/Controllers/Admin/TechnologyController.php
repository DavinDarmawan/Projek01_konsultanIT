<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        return view('admin.technologies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:20',
        ]);
        Technology::create($request->all());
        return redirect()->route('admin.technologies.index')->with('success', 'Teknologi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $technology = Technology::findOrFail($id);
        return view('admin.technologies.edit', compact('technology'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:20',
        ]);
        $technology = Technology::findOrFail($id);
        $technology->update($request->all());
        return redirect()->route('admin.technologies.index')->with('success', 'Teknologi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Technology::destroy($id);
        return redirect()->route('admin.technologies.index')->with('success', 'Teknologi berhasil dihapus.');
    }
}