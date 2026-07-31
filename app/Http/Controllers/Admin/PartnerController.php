<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Helpers\StorageCleanup;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('created_at', 'desc')->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'project_name' => 'nullable|string|max:255',
            'image'        => 'nullable|image|max:2048',
            'website'      => 'nullable|url|max:255',
            'icon'         => 'nullable|image|max:1024',
        ]);

        $partner = new Partner();
        $partner->company_name = $request->company_name;
        $partner->project_name = $request->project_name;
        $partner->website      = $request->website;

        if ($request->hasFile('image')) {
            $partner->image = $request->file('image')->store('partners', 'public');
        }

        if ($request->hasFile('icon')) {
            $partner->icon = $request->file('icon')->store('partners/icons', 'public');
        }

        $partner->save();

        return redirect()->route('admin.partners.index')
                         ->with('success', 'Partner berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'project_name' => 'nullable|string|max:255',
            'image'        => 'nullable|image|max:2048',
            'website'      => 'nullable|url|max:255',
            'icon'         => 'nullable|image|max:1024',
        ]);

        $partner = Partner::findOrFail($id);
        $partner->company_name = $request->company_name;
        $partner->project_name = $request->project_name;
        $partner->website      = $request->website;

        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage
            StorageCleanup::deleteFile($partner->image);
            $partner->image = $request->file('image')->store('partners', 'public');
        }

        if ($request->hasFile('icon')) {
            // Hapus icon lama dari storage
            StorageCleanup::deleteFile($partner->icon);
            $partner->icon = $request->file('icon')->store('partners/icons', 'public');
        }

        $partner->save();

        return redirect()->route('admin.partners.index')
                         ->with('success', 'Partner berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);

        // Hapus semua file dari storage
        StorageCleanup::deleteFiles([
            $partner->image,
            $partner->icon,
        ]);

        // Hapus record dari database
        $partner->delete();

        return redirect()->route('admin.partners.index')
                         ->with('success', 'Partner berhasil dihapus.');
    }
}
