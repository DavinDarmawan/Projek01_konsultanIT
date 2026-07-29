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
        
        // Default social media jika kosong
        if (empty($company->social_media) || !is_array($company->social_media)) {
            $company->social_media = [
                ['platform' => 'Instagram', 'url' => '', 'icon' => 'bi-instagram'],
                ['platform' => 'LinkedIn', 'url' => '', 'icon' => 'bi-linkedin'],
                ['platform' => 'YouTube', 'url' => '', 'icon' => 'bi-youtube'],
                ['platform' => 'Facebook', 'url' => '', 'icon' => 'bi-facebook'],
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
            'social_platforms' => 'nullable|array',
            'social_urls' => 'nullable|array',
            'social_icons' => 'nullable|array',
        ]);

        $company = CompanyInfo::findOrFail($id);
        
        // Data dasar
        $data = $request->only(['address', 'email', 'phone', 'whatsapp', 'map_embed']);
        
        // 🔥 Proses sosial media dari array
        $socials = [];
        if ($request->has('social_platforms')) {
            foreach ($request->social_platforms as $key => $platform) {
                if (!empty($platform) && !empty($request->social_urls[$key])) {
                    $socials[] = [
                        'platform' => $platform,
                        'url' => $request->social_urls[$key],
                        'icon' => $request->social_icons[$key] ?? 'bi-link',
                    ];
                }
            }
        }
        $data['social_media'] = $socials;
        
        $company->update($data);

        return redirect()->route('admin.company.edit', $company->id)
                         ->with('success', 'Data perusahaan berhasil diperbarui! 🎉');
    }
}