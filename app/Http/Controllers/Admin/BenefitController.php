<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Benefit;

class BenefitController extends Controller
{
    public function index()
    {
        $benefits = Benefit::all();
        return view('admin.benefits.index', compact('benefits'));
    }

    public function create()
    {
        return view('admin.benefits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        Benefit::create($request->all());
        return redirect()->route('admin.benefits.index')->with('success', 'Benefit berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $benefit = Benefit::findOrFail($id);
        return view('admin.benefits.edit', compact('benefit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $benefit = Benefit::findOrFail($id);
        $benefit->update($request->all());
        return redirect()->route('admin.benefits.index')->with('success', 'Benefit berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Benefit::destroy($id);
        return redirect()->route('admin.benefits.index')->with('success', 'Benefit berhasil dihapus.');
    }
}