<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Helpers\StorageCleanup;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('created_at', 'desc')->get();
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'position'    => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
            'linkedin'    => 'nullable|url|max:255',
            'instagram'   => 'nullable|string|max:255',
            'github'      => 'nullable|url|max:255',
        ]);

        $team = new Team();
        $team->name        = $request->name;
        $team->position    = $request->position;
        $team->description = $request->description;
        $team->linkedin    = $request->linkedin;
        $team->instagram   = $request->instagram;
        $team->github      = $request->github;

        if ($request->hasFile('image')) {
            $team->image = $request->file('image')->store('teams', 'public');
        }

        $team->save();

        return redirect()->route('admin.teams.index')
                         ->with('success', 'Anggota tim berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'position'    => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
            'linkedin'    => 'nullable|url|max:255',
            'instagram'   => 'nullable|string|max:255',
            'github'      => 'nullable|url|max:255',
        ]);

        $team = Team::findOrFail($id);
        $team->name        = $request->name;
        $team->position    = $request->position;
        $team->description = $request->description;
        $team->linkedin    = $request->linkedin;
        $team->instagram   = $request->instagram;
        $team->github      = $request->github;

        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage
            StorageCleanup::deleteFile($team->image);
            $team->image = $request->file('image')->store('teams', 'public');
        }

        $team->save();

        return redirect()->route('admin.teams.index')
                         ->with('success', 'Anggota tim berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        // Hapus gambar dari storage
        StorageCleanup::deleteFile($team->image);

        // Hapus record dari database
        $team->delete();

        return redirect()->route('admin.teams.index')
                         ->with('success', 'Anggota tim berhasil dihapus.');
    }
}
