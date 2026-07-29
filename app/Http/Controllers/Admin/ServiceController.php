<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index()
    {
        $services = Service::orderBy('created_at', 'desc')->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'status'      => 'required|in:active,inactive',
            'image'       => 'nullable|image|max:2048',
        ]);

        $service = new Service();
        $service->title       = $request->title;
        $service->slug        = Str::slug($request->title);
        $service->description = $request->description;
        $service->benefits    = $request->benefits;
        $service->technologies = $request->technologies;
        $service->status      = $request->status;
        $service->created_by  = auth()->id();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
            $service->image = $path;
        }

        $service->save();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'status'      => 'required|in:active,inactive',
            'image'       => 'nullable|image|max:2048',
        ]);

        $service = Service::findOrFail($id);
        $service->title       = $request->title;
        $service->slug        = Str::slug($request->title);
        $service->description = $request->description;
        $service->benefits    = $request->benefits;
        $service->technologies = $request->technologies;
        $service->status      = $request->status;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($service->image && \Storage::exists('public/' . $service->image)) {
                \Storage::delete('public/' . $service->image);
            }
            $path = $request->file('image')->store('services', 'public');
            $service->image = $path;
        }

        $service->save();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service berhasil diperbarui.');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        // Hapus gambar jika ada
        if ($service->image && \Storage::exists('public/' . $service->image)) {
            \Storage::delete('public/' . $service->image);
        }
        $service->delete();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service berhasil dihapus.');
    }
}