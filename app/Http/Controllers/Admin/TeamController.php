<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Menampilkan halaman daftar tim (index.blade.php)
     */
    public function index()
    {
        // Mengambil semua data tim dari database
        $teams = Team::all();
        
        // Mengarahkan ke file resources/views/admin/teams/index.blade.php
        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Menampilkan halaman form tambah tim (create.blade.php)
     */
    public function create()
    {
        // Mengarahkan ke file resources/views/admin/teams/create.blade.php
        return view('admin.teams.create');
    }

    /**
     * Menyimpan data dari form tambah ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'icon' => 'nullable|string|max:50',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
        ]);

        $data = $request->all();

        // Upload image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('team', 'public');
            $data['image'] = $path;
        }

        Team::create($data);

        return redirect()->route('admin.teams.index')
            ->with('success', 'Anggota tim berhasil ditambahkan! 🎉');
    }

    /**
     * Menampilkan halaman form edit tim (edit.blade.php)
     */
    public function edit($id)
    {
        // Cari data berdasarkan ID
        $team = Team::findOrFail($id);
        
        // Mengarahkan ke file resources/views/admin/teams/edit.blade.php dengan membawa data tim
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Menyimpan perubahan data dari form edit ke database
     */
public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'icon' => 'nullable|string|max:50',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
        ]);

        $team = Team::findOrFail($id);
        $data = $request->all();

        // Upload image baru
        if ($request->hasFile('image')) {
            if ($team->image && \Storage::exists('public/' . $team->image)) {
                \Storage::delete('public/' . $team->image);
            }
            $path = $request->file('image')->store('team', 'public');
            $data['image'] = $path;
        }

        $team->update($data);

        return redirect()->route('admin.teams.index')
            ->with('success', 'Data anggota tim berhasil diperbarui! 🎉');
    }


    /**
     * Menghapus data tim dari database
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('admin.teams.index')->with('success', 'Anggota tim berhasil dihapus!');
    }
}
