<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    // ==========================================
    // ENDPOINT PUBLIK (Untuk Frontend Website)
    // ==========================================

    public function indexPublic()
    {
        $teams = Team::all();
        return response()->json(['message' => 'Sukses', 'data' => $teams], 200);
    }

    public function showPublic($id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json(['message' => 'Anggota tim tidak ditemukan'], 404);
        }

        return response()->json(['message' => 'Sukses', 'data' => $team], 200);
    }

    // ==========================================
    // ENDPOINT ADMIN (Untuk Dashboard)
    // ==========================================

    public function index()
    {
        $teams = Team::all();
        return response()->json(['message' => 'Sukses', 'data' => $teams], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'position'    => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
            'icon'        => 'nullable|string|max:255',
            'linkedin'    => 'nullable|url|max:255',
            'instagram'   => 'nullable|url|max:255',
            'github'      => 'nullable|url|max:255',
        ]);

        $team = new Team();
        $team->name        = $request->name;
        $team->position    = $request->position;
        $team->description = $request->description;
        $team->icon        = $request->icon;
        $team->linkedin    = $request->linkedin;
        $team->instagram   = $request->instagram;
        $team->github      = $request->github;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('team', 'public');
            $team->image = $path;
        }

        $team->save();

        return response()->json(['message' => 'Anggota tim berhasil ditambahkan', 'data' => $team], 201);
    }

    public function show($id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json(['message' => 'Anggota tim tidak ditemukan'], 404);
        }

        return response()->json(['message' => 'Sukses', 'data' => $team], 200);
    }

    public function update(Request $request, $id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json(['message' => 'Anggota tim tidak ditemukan'], 404);
        }

        $request->validate([
            'name'        => 'required|string|max:255',
            'position'    => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
            'icon'        => 'nullable|string|max:255',
            'linkedin'    => 'nullable|url|max:255',
            'instagram'   => 'nullable|url|max:255',
            'github'      => 'nullable|url|max:255',
        ]);

        $team->name        = $request->name;
        $team->position    = $request->position;
        $team->description = $request->description;
        $team->icon        = $request->icon;
        $team->linkedin    = $request->linkedin;
        $team->instagram   = $request->instagram;
        $team->github      = $request->github;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($team->image && Storage::exists('public/' . $team->image)) {
                Storage::delete('public/' . $team->image);
            }
            $path = $request->file('image')->store('team', 'public');
            $team->image = $path;
        }

        $team->save();

        return response()->json(['message' => 'Anggota tim berhasil diperbarui', 'data' => $team], 200);
    }

    public function destroy($id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json(['message' => 'Anggota tim tidak ditemukan'], 404);
        }

        // Hapus gambar jika ada
        if ($team->image && Storage::exists('public/' . $team->image)) {
            Storage::delete('public/' . $team->image);
        }

        $team->delete();

        return response()->json(['message' => 'Anggota tim berhasil dihapus'], 200);
    }
}
