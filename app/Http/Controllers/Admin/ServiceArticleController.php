<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceArticle;
use App\Models\Service;
use App\Helpers\StorageCleanup;
use Illuminate\Support\Str;

class ServiceArticleController extends Controller
{
    public function index()
    {
        $articles = ServiceArticle::with('service')
                        ->orderBy('created_at', 'desc')
                        ->get();
        return view('admin.service-articles.index', compact('articles'));
    }

    public function create()
    {
        $services = Service::orderBy('title')->get();
        return view('admin.service-articles.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id'       => 'required|exists:services,id',
            'title'            => 'required|string|max:255',
            'content'          => 'required|string',
            'featured_image'   => 'nullable|image|max:2048',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'status'           => 'required|in:draft,published',
        ]);

        $article = new ServiceArticle();
        $article->service_id       = $request->service_id;
        $article->title            = $request->title;
        $article->slug             = Str::slug($request->title);
        $article->content          = $request->content;
        $article->meta_title       = $request->meta_title;
        $article->meta_description = $request->meta_description;
        $article->status           = $request->status;

        if ($request->hasFile('featured_image')) {
            $article->featured_image = $request->file('featured_image')
                                               ->store('service-articles', 'public');
        }

        $article->save();

        return redirect()->route('admin.service-articles.index')
                         ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $article  = ServiceArticle::findOrFail($id);
        $services = Service::orderBy('title')->get();
        return view('admin.service-articles.edit', compact('article', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'service_id'       => 'required|exists:services,id',
            'title'            => 'required|string|max:255',
            'content'          => 'required|string',
            'featured_image'   => 'nullable|image|max:2048',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'status'           => 'required|in:draft,published',
        ]);

        $article = ServiceArticle::findOrFail($id);
        $article->service_id       = $request->service_id;
        $article->title            = $request->title;
        $article->slug             = Str::slug($request->title);
        $article->content          = $request->content;
        $article->meta_title       = $request->meta_title;
        $article->meta_description = $request->meta_description;
        $article->status           = $request->status;

        if ($request->hasFile('featured_image')) {
            // Hapus gambar lama dari storage
            StorageCleanup::deleteFile($article->featured_image);
            $article->featured_image = $request->file('featured_image')
                                               ->store('service-articles', 'public');
        }

        $article->save();

        return redirect()->route('admin.service-articles.index')
                         ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $article = ServiceArticle::findOrFail($id);

        // Hapus featured_image dari storage
        StorageCleanup::deleteFile($article->featured_image);

        // Hapus record dari database
        $article->delete();

        return redirect()->route('admin.service-articles.index')
                         ->with('success', 'Artikel berhasil dihapus.');
    }
}
