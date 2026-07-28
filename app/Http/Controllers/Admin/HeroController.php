<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSection;

class HeroController extends Controller
{
    public function edit($id)
    {
        $hero = HeroSection::findOrFail($id);
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'nullable|string|max:255',
            'subtitle'    => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'image'       => 'nullable|image|max:2048',
        ]);

        $hero = HeroSection::findOrFail($id);
        $hero->title       = $request->title;
        $hero->subtitle    = $request->subtitle;
        $hero->button_text = $request->button_text;
        $hero->button_link = $request->button_link;

        if ($request->hasFile('image')) {
            if ($hero->image && \Storage::exists('public/' . $hero->image)) {
                \Storage::delete('public/' . $hero->image);
            }
            $path = $request->file('image')->store('hero', 'public');
            $hero->image = $path;
        }

        $hero->save();

        return redirect()->route('admin.hero.edit', $hero->id)
                         ->with('success', 'Hero berhasil diperbarui.');
    }
}