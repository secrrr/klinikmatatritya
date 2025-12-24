<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        
        // Auto generate excerpt if not provided
        if (empty($data['excerpt'])) {
            $data['excerpt'] = Str::limit(strip_tags($request->content), 150);
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
            $data['image'] = $imagePath;
        }

        Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        // Auto generate excerpt if not provided
        if (empty($data['excerpt'])) {
            $data['excerpt'] = Str::limit(strip_tags($request->content), 150);
        }

        if ($request->hasFile('image')) {
            // Delete old image
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $imagePath = $request->file('image')->store('articles', 'public');
            $data['image'] = $imagePath;
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
