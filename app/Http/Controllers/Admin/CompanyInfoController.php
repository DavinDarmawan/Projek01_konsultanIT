<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyInfo;

class CompanyInfoController extends Controller
{
    public function edit($id)
    {
        $company = CompanyInfo::findOrFail($id);
        return view('admin.company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'map_embed' => 'nullable|string',
            'social_media' => 'nullable|array',
        ]);

        $company = CompanyInfo::findOrFail($id);
        $company->update($request->all());

        return redirect()->route('admin.company.edit', $company->id)
                         ->with('success', 'Data perusahaan berhasil diperbarui.');
    }
}