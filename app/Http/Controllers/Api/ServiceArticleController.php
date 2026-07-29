<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceArticleController extends Controller
{
    // ==========================================
    // ENDPOINT PUBLIK
    // ==========================================

    public function indexPublic()
    {
        $articles = ServiceArticle::with('service')
            ->where('status', 'published')
            ->latest()
            ->get();

        return response()->json([
            'message' => 'Sukses',
            'data' => $articles
        ], 200);
    }

    public function showPublic($slug)
    {
        $article = ServiceArticle::with('service')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->first();

        if (!$article) {
            return response()->json([
                'message' => 'Artikel tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'message' => 'Sukses',
            'data' => $article
        ], 200);
    }

    // ==========================================
    // ENDPOINT ADMIN
    // ==========================================

    public function index()
    {
        $articles = ServiceArticle::with('service')
            ->latest()
            ->get();

        return response()->json([
            'message' => 'Sukses',
            'data' => $articles
        ], 200);
    }

    public function show(string $id)
    {
        $article = ServiceArticle::with('service')->find($id);

        if (!$article) {
            return response()->json([
                'message' => 'Artikel tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'message' => 'Sukses',
            'data' => $article
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request
                ->file('featured_image')
                ->store('service_articles', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']);

        $article = ServiceArticle::create($validated);

        return response()->json([
            'message' => 'Artikel berhasil ditambahkan',
            'data' => $article
        ], 201);
    }

    public function update(Request $request, string $id)
    {
        $article = ServiceArticle::find($id);

        if (!$article) {
            return response()->json([
                'message' => 'Artikel tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('featured_image')) {

            if ($article->featured_image && Storage::disk('public')->exists($article->featured_image)) {
                Storage::disk('public')->delete($article->featured_image);
            }

            $validated['featured_image'] = $request
                ->file('featured_image')
                ->store('service_articles', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']);

        $article->update($validated);

        return response()->json([
            'message' => 'Artikel berhasil diperbarui',
            'data' => $article
        ], 200);
    }

    public function destroy(string $id)
    {
        $article = ServiceArticle::find($id);

        if (!$article) {
            return response()->json([
                'message' => 'Artikel tidak ditemukan'
            ], 404);
        }

        if ($article->featured_image && Storage::disk('public')->exists($article->featured_image)) {
            Storage::disk('public')->delete($article->featured_image);
        }

        $article->delete();

        return response()->json([
            'message' => 'Artikel berhasil dihapus'
        ], 200);
    }
}