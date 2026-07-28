<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cta;
use Illuminate\Http\Request;

class CtaController extends Controller
{
    public function indexPublic()
    {
        $cta = Cta::first(); // biasanya hanya 1 record
        return response()->json(['message' => 'Sukses', 'data' => $cta], 200);
    }
}