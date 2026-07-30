<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function indexPublic()
    {
        return Benefit::with('service')->get();
    }

    public function showPublic($id)
    {
        return Benefit::with('service')
            ->findOrFail($id);
    }

    public function index()
    {
        return Benefit::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:100',
            'description' => 'nullable|string',
        ]);

        $benefit = Benefit::create([
            'service_id' => $request->service_id,
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Benefit berhasil ditambahkan',
            'data' => $benefit
        ], 201);
    }

    public function show(Benefit $benefit)
    {
        return $benefit;
    }

    public function update(Request $request, Benefit $benefit)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:100',
            'description' => 'nullable|string',
        ]);

        $benefit->update([
            'service_id' => $request->service_id,
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Benefit berhasil diperbarui',
            'data' => $benefit
        ]);
    }

    public function destroy(Benefit $benefit)
    {
        $benefit->delete();

        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}