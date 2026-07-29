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
        return Benefit::create($request->all());
    }

    public function show(Benefit $benefit)
    {
        return $benefit;
    }

    public function update(Request $request, Benefit $benefit)
    {
        $benefit->update($request->all());

        return $benefit;
    }

    public function destroy(Benefit $benefit)
    {
        $benefit->delete();

        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}