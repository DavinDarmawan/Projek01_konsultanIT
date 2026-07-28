<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroController extends Controller
{
   
    
    public function indexPublic()
    {
        
        $hero = HeroSection::first();
        
        if (!$hero) {
            return response()->json(['message' => 'Data hero belum ada', 'data' => null], 404);
        }
        
        return response()->json(['message' => 'Sukses', 'data' => $hero], 200);
    }

   

    public function index()
    {
        $heroes = HeroSection::all();
        return response()->json(['message' => 'Sukses', 'data' => $heroes], 200);
    }

    public function store(Request $request)
    {
        $hero = new HeroSection();
        $hero->title = $request->title;
        $hero->subtitle = $request->subtitle;
        $hero->button_text = $request->button_text;
        $hero->button_link = $request->button_link;
        
      

        $hero->save();

        return response()->json(['message' => 'Hero berhasil ditambahkan', 'data' => $hero], 201);
    }

    public function show($id)
    {
        $hero = HeroSection::find($id);
        
        if (!$hero) {
            return response()->json(['message' => 'Hero tidak ditemukan'], 404);
        }

        return response()->json(['message' => 'Sukses', 'data' => $hero], 200);
    }

    public function update(Request $request, $id)
    {
        $hero = HeroSection::find($id);
        
        if (!$hero) {
            return response()->json(['message' => 'Hero tidak ditemukan'], 404);
        }
        
        $hero->title = $request->title;
        $hero->subtitle = $request->subtitle;
        $hero->button_text = $request->button_text;
        $hero->button_link = $request->button_link;

        $hero->save();

        return response()->json(['message' => 'Hero berhasil diperbarui', 'data' => $hero], 200);
    }

    public function destroy($id)
    {
        $hero = HeroSection::find($id);
        
        if ($hero) {
            $hero->delete();
            return response()->json(['message' => 'Hero berhasil dihapus'], 200);
        }

        return response()->json(['message' => 'Hero tidak ditemukan'], 404);
    }
}