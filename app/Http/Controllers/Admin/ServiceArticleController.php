<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceArticle;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceArticleController extends Controller
{
    public function index()
    {
        $articles = ServiceArticle::with('service')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('admin.service-articles.index', compact('articles'));
    }

    public function create()
    {
        // Hanya tampilkan service yang BELUM punya artikel
        $services = Service::where('status', 'active')
            ->whereDoesntHave('article')
            ->orderBy('title')
            ->get();
        
        return view('admin.service-articles.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'nullable|exists:services,id|unique:service_articles,service_id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:service_articles,slug',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'status' => 'required|in:draft,published',
        ]);

        // Generate slug jika kosong
        $slug = $request->slug ?? Str::slug($request->title);
        
        // Cek slug duplikat
        $count = ServiceArticle::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $data = $request->all();
        $data['slug'] = $slug;

        // Upload gambar
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('service-articles', 'public');
            $data['featured_image'] = $path;
        }

        ServiceArticle::create($data);

        return redirect()->route('admin.service-articles.index')
            ->with('success', 'Artikel berhasil ditambahkan! 🎉');
    }

    public function edit($id)
    {
        $article = ServiceArticle::findOrFail($id);
        
        // Tampilkan service yang dipilih + service lain yang belum punya artikel
        $services = Service::where('status', 'active')
            ->where(function($query) use ($article) {
                $query->whereDoesntHave('article')
                      ->orWhere('id', $article->service_id);
            })
            ->orderBy('title')
            ->get();
        
        return view('admin.service-articles.edit', compact('article', 'services'));
    }

    public function update(Request $request, $id)
    {
        $article = ServiceArticle::findOrFail($id);

        $request->validate([
            'service_id' => 'nullable|exists:services,id|unique:service_articles,service_id,' . $id,
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:service_articles,slug,' . $id,
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'status' => 'required|in:draft,published',
        ]);

        $data = $request->all();

        // Generate slug jika kosong
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($request->title);
        }

        // Upload gambar baru
        if ($request->hasFile('featured_image')) {
            if ($article->featured_image && \Storage::exists('public/' . $article->featured_image)) {
                \Storage::delete('public/' . $article->featured_image);
            }
            $path = $request->file('featured_image')->store('service-articles', 'public');
            $data['featured_image'] = $path;
        }

        $article->update($data);

        return redirect()->route('admin.service-articles.index')
            ->with('success', 'Artikel berhasil diperbarui! 🎉');
    }

    public function destroy($id)
    {
        $article = ServiceArticle::findOrFail($id);
        
        if ($article->featured_image && \Storage::exists('public/' . $article->featured_image)) {
            \Storage::delete('public/' . $article->featured_image);
        }
        
        $article->delete();

        return redirect()->route('admin.service-articles.index')
            ->with('success', 'Artikel berhasil dihapus! 🗑️');
    }
}