<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Menampilkan halaman daftar partner (index.blade.php)
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Menampilkan halaman form tambah partner (create.blade.php)
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Menyimpan data dari form tambah ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'project_name' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048', // Maksimal 2MB
            'website' => 'nullable|url|max:255',
            'icon' => 'nullable|string|max:50',
        ]);

        $data = $request->all();

        // Upload image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('partner', 'public');
            $data['image'] = $path;
        }

        Partner::create($data);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Data partner berhasil ditambahkan! 🎉');
    }

    /**
     * Menampilkan halaman form edit partner (edit.blade.php)
     */
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Menyimpan perubahan data dari form edit ke database
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'project_name' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'website' => 'nullable|url|max:255',
            'icon' => 'nullable|string|max:50',
        ]);

        $partner = Partner::findOrFail($id);
        $data = $request->all();

        // Upload image baru dan hapus yang lama
        if ($request->hasFile('image')) {
            if ($partner->image && \Storage::exists('public/' . $partner->image)) {
                \Storage::delete('public/' . $partner->image);
            }
            $path = $request->file('image')->store('partner', 'public');
            $data['image'] = $path;
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Data partner berhasil diperbarui! 🎉');
    }

    /**
     * Menghapus data partner dari database
     */
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        
        // Hapus file gambar dari storage jika ada
        if ($partner->image && \Storage::exists('public/' . $partner->image)) {
            \Storage::delete('public/' . $partner->image);
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Data partner berhasil dihapus!');
    }
}