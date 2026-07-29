<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;

class CompanyInfoController extends Controller
{
  public function index()
{
    $company = CompanyInfo::first();

    return response()->json([
        'message' => 'Sukses',
        'data' => $company
    ], 200);
}

public function show($id)
{
    $company = CompanyInfo::find($id);

    if (!$company) {
        return response()->json([
            'message' => 'Data perusahaan tidak ditemukan'
        ], 404);
    }

    return response()->json([
        'message' => 'Sukses',
        'data' => $company
    ], 200);
}

public function update(Request $request, $id)
{
    $request->validate([
        'company_name' => 'required|string|max:255',
        'about' => 'required|string',
        'vision' => 'required|string',
        'mission' => 'required|string',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $company = CompanyInfo::find($id);

    if (!$company) {
        return response()->json([
            'message' => 'Data perusahaan tidak ditemukan'
        ], 404);
    }

    $company->company_name = $request->company_name;
    $company->about = $request->about;
    $company->vision = $request->vision;
    $company->mission = $request->mission;

    if ($request->hasFile('logo')) {

        if (
            $company->logo &&
            file_exists(storage_path('app/public/' . $company->logo))
        ) {
            unlink(storage_path('app/public/' . $company->logo));
        }

        $logo = $request->file('logo');
        $filename = time() . '_' . $logo->getClientOriginalName();

        $logo->storeAs('public/company', $filename);

        $company->logo = 'company/' . $filename;
    }

    $company->save();

    return response()->json([
        'message' => 'Data perusahaan berhasil diperbarui',
        'data' => $company
    ], 200);
}


}