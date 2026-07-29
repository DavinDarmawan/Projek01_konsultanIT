<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    // ==========================================
    // ENDPOINT PUBLIK (Untuk Frontend Website)
    // ==========================================

    public function indexPublic()
    {
        $partners = Partner::all();

        return response()->json([
            'message' => 'Sukses',
            'data' => $partners
        ], 200);
    }

    // ==========================================
    // ENDPOINT ADMIN (Untuk Dashboard)
    // ==========================================

    public function index()
    {
        $partners = Partner::all();

        return response()->json([
            'message' => 'Sukses',
            'data' => $partners
        ], 200);
    }

   public function store(Request $request)
{
    $request->validate([
        'company_name' => 'required|string|max:255',
        'project_name' => 'required|string|max:255',
        'website' => 'nullable|url|max:255',
        'icon' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $partner = new Partner();

    $partner->company_name = $request->company_name;
    $partner->project_name = $request->project_name;
    $partner->website = $request->website;
    $partner->icon = $request->icon;

    // Upload Image
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();

        $image->storeAs('public/partners', $filename);

        $partner->image = 'partners/' . $filename;
    }

    $partner->save();

    return response()->json([
        'message' => 'Partner berhasil ditambahkan',
        'data' => $partner
    ], 201);
}

   public function show($id)
{
    $partner = Partner::find($id);

    if (!$partner) {
        return response()->json([
            'message' => 'Partner tidak ditemukan'
        ], 404);
    }

    return response()->json([
        'message' => 'Sukses',
        'data' => $partner
    ], 200);
}

    public function update(Request $request, $id)
{
    $request->validate([
        'company_name' => 'required|string|max:255',
        'project_name' => 'required|string|max:255',
        'website' => 'nullable|url|max:255',
        'icon' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $partner = Partner::find($id);

    if (!$partner) {
        return response()->json([
            'message' => 'Partner tidak ditemukan'
        ], 404);
    }

    $partner->company_name = $request->company_name;
    $partner->project_name = $request->project_name;
    $partner->website = $request->website;
    $partner->icon = $request->icon;

    // Upload image baru jika ada
    if ($request->hasFile('image')) {

        // Hapus gambar lama
        if (
            $partner->image &&
            file_exists(storage_path('app/public/' . $partner->image))
        ) {
            unlink(storage_path('app/public/' . $partner->image));
        }

        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();

        $image->storeAs('public/partners', $filename);

        $partner->image = 'partners/' . $filename;
    }

    $partner->save();

    return response()->json([
        'message' => 'Partner berhasil diperbarui',
        'data' => $partner
    ], 200);
}

   public function destroy($id)
{
    $partner = Partner::find($id);

    if (!$partner) {
        return response()->json([
            'message' => 'Partner tidak ditemukan'
        ], 404);
    }

    // Hapus gambar jika ada
    if (
        $partner->image &&
        file_exists(storage_path('app/public/' . $partner->image))
    ) {
        unlink(storage_path('app/public/' . $partner->image));
    }

    // Hapus data dari database
    $partner->delete();

    return response()->json([
        'message' => 'Partner berhasil dihapus'
    ], 200);
}
}