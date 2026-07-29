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

        if (empty($company->social_media) || !is_array($company->social_media)) {
            $company->social_media = [
                ['platform' => 'Instagram', 'url' => '#', 'icon' => 'bi-instagram'],
                ['platform' => 'LinkedIn', 'url' => '#', 'icon' => 'bi-linkedin'],
                ['platform' => 'YouTube', 'url' => '#', 'icon' => 'bi-youtube'],
                ['platform' => 'Facebook', 'url' => '#', 'icon' => 'bi-facebook'],
            ];
        }

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
            'social_media' => 'nullable|string',
        ]);

        $company = CompanyInfo::findOrFail($id);

        $data = $request->only(['address', 'email', 'phone', 'whatsapp', 'map_embed']);

        if ($request->filled('social_media')) {
            $socialMedia = json_decode($request->social_media, true);

            if (is_array($socialMedia)) {
                $data['social_media'] = $socialMedia;
            } else {
                return back()->withErrors(['social_media' => 'Format JSON tidak valid.']);
            }
        } else {
            $data['social_media'] = [];
        }

        $company->fill($data);
        $company->save();

        return redirect()->route('admin.company.edit', $company->id)
            ->with('success', 'Data perusahaan berhasil diperbarui! 🎉');
    }
}