<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::orderBy('created_at', 'desc')->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'client'      => 'nullable|string|max:255',
            'project_url' => 'nullable|url',
            'image'       => 'nullable|image|max:2048',
        ]);

        $portfolio = new Portfolio();
        $portfolio->title       = $request->title;
        $portfolio->client      = $request->client;
        $portfolio->description = $request->description;
        $portfolio->project_url = $request->project_url;
        $portfolio->created_by  = auth()->id();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('portfolios', 'public');
            $portfolio->image = $path;
        }

        $portfolio->save();

        return redirect()->route('admin.portfolios.index')
                         ->with('success', 'Portfolio berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'client'      => 'nullable|string|max:255',
            'project_url' => 'nullable|url',
            'image'       => 'nullable|image|max:4096', // Maksimal 4MB
        ]);

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->title       = $request->title;
        $portfolio->client      = $request->client;
        $portfolio->description = $request->description;
        $portfolio->project_url = $request->project_url;

        if ($request->hasFile('image')) {
            if ($portfolio->image && \Storage::exists('public/' . $portfolio->image)) {
                \Storage::delete('public/' . $portfolio->image);
            }
            $path = $request->file('image')->store('portfolios', 'public');
            $portfolio->image = $path;
        }

        $portfolio->save();

        return redirect()->route('admin.portfolios.index')
                         ->with('success', 'Portfolio berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        if ($portfolio->image && \Storage::exists('public/' . $portfolio->image)) {
            \Storage::delete('public/' . $portfolio->image);
        }
        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
                         ->with('success', 'Portfolio berhasil dihapus.');
    }
}