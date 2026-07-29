<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function indexPublic()
    {
        $technologies = Technology::all();
        return response()->json(['message' => 'Sukses', 'data' => $technologies], 200);
    }
}