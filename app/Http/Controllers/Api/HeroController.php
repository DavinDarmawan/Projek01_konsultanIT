<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    //
    public function indexPublic()
    {
        $hero = HeroSection::first(); // Ambil satu record (biasanya id=1)
        return response()->json(['message' => 'Sukses', 'data' => $hero], 200);
    }
}
