<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cta;

class CtaController extends Controller
{
    public function edit($id)
    {
        $cta = Cta::findOrFail($id);
        return view('admin.cta.edit', compact('cta'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'background_color' => 'nullable|string|max:20',
            'button_color' => 'nullable|string|max:20',
        ]);
        $cta = Cta::findOrFail($id);
        $cta->update($request->all());
        return redirect()->route('admin.cta.edit', $cta->id)->with('success', 'CTA berhasil diperbarui.');
    }
}