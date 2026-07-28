<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // ==========================================
    // ENDPOINT PUBLIK (Untuk Frontend Website)
    // ==========================================
    
    public function indexPublic()
    {
        $portfolios = Portfolio::all();
        return response()->json(['message' => 'Sukses', 'data' => $portfolios], 200);
    }

    public function showPublic($id)
    {
        $portfolio = Portfolio::find($id);
        
        if (!$portfolio) {
            return response()->json(['message' => 'Portofolio tidak ditemukan'], 404);
        }
        
        return response()->json(['message' => 'Sukses', 'data' => $portfolio], 200);
    }

    // ==========================================
    // ENDPOINT ADMIN (Untuk Dashboard)
    // ==========================================

    public function index()
    {
        $portfolios = Portfolio::all();
        return response()->json(['message' => 'Sukses', 'data' => $portfolios], 200);
    }

    public function store(Request $request)
    {
        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->client = $request->client;
        $portfolio->description = $request->description;
        $portfolio->project_url = $request->project_url;
        $portfolio->created_by = auth()->id(); // Menyimpan ID admin yang membuat data
        
        // Logika upload gambar (image) bisa ditambahkan di sini nanti

        $portfolio->save();

        return response()->json(['message' => 'Portofolio berhasil ditambahkan', 'data' => $portfolio], 201);
    }

    public function show($id)
    {
        $portfolio = Portfolio::find($id);
        return response()->json(['message' => 'Sukses', 'data' => $portfolio], 200);
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::find($id);
        
        $portfolio->title = $request->title;
        $portfolio->client = $request->client;
        $portfolio->description = $request->description;
        $portfolio->project_url = $request->project_url;

        $portfolio->save();

        return response()->json(['message' => 'Portofolio berhasil diperbarui', 'data' => $portfolio], 200);
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->delete();
        
        return response()->json(['message' => 'Portofolio berhasil dihapus'], 200);
    }
}