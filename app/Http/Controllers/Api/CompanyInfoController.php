<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;

class CompanyInfoController extends Controller
{
    public function indexPublic()
    {
        $company = CompanyInfo::first();
        return response()->json(['message' => 'Sukses', 'data' => $company], 200);
    }
}