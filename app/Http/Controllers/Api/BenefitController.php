<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function indexPublic()
    {
        $benefits = Benefit::all();
        return response()->json(['message' => 'Sukses', 'data' => $benefits], 200);
    }
}