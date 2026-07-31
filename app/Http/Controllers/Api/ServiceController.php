<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\ActivityLogger;

class ServiceController extends Controller
{
 
    
    public function indexPublic()
    {
        // Hanya menampilkan layanan yang statusnya 'active'
        $services = Service::where('status', 'active')->get();
        return response()->json(['message' => 'Sukses', 'data' => $services], 200);
    }

    public function showPublic($slug)
    {
        // Mencari layanan spesifik berdasarkan slug
        $service = Service::where('slug', $slug)->first();
        if (!$service) {
            return response()->json(['message' => 'Layanan tidak ditemukan'], 404);
        }
        return response()->json(['message' => 'Sukses', 'data' => $service], 200);
    }

    // ==========================================
    // ENDPOINT ADMIN (Untuk Dashboard)
    // ==========================================

    public function index()
    {
        $services = Service::all();
        return response()->json(['message' => 'Sukses', 'data' => $services], 200);
    }

    public function store(Request $request)
    {
        // Tambahkan validasi data di sini nantinya
        
        $service = new Service();
        $service->title = $request->title;

        $service->description = $request->description;
        $service->benefits = $request->benefits;
        $service->technologies = $request->technologies;
        $service->status = $request->status ?? 'active';
        $service->created_by = auth()->id(); // Mengambil ID admin yang sedang login
        
        // Logika upload gambar (image) bisa ditambahkan di sini

        $service->save();

        return response()->json(['message' => 'Layanan berhasil ditambahkan', 'data' => $service], 201);
    }

    public function show($id)
    {
        $service = Service::find($id);
        return response()->json(['message' => 'Sukses', 'data' => $service], 200);
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->description = $request->description;
        $service->benefits = $request->benefits;
        $service->technologies = $request->technologies;
        $service->status = $request->status;

        $service->save();

        return response()->json(['message' => 'Layanan berhasil diperbarui', 'data' => $service], 200);
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return response()->json(['message' => 'Layanan berhasil dihapus'], 200);
    }
}