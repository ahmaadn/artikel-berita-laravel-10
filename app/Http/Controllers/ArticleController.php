<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Like;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ArticleController extends Controller
{
    // NO PUBLIS NO AUTH
    public function show($id): View
    {
        $article = Article::findOrFail($id);
        $like = Like::where('article_id', '=', $article->id)->where('user_id', '=', auth()->user()->id)->exists();
        return view('pages.articles.index', ['article' => $article, 'like' => $like]);
    }

    public function latest(): View
    {
        $article = Article::latest()->first();
        $like = Like::where('article_id', '=', $article->id)->where('user_id', '=', auth()->user()->id)->exists();
        return view('pages.articles.index', ['article' => $article, 'like' => $like]);
    }

    // AUTH
    public function index(): View
    {
        if (auth()->user()->role != 'admin') {
            $article = Article::where('user_id', '=', auth()->user()->id)->get();
        } else {
            $article = Article::get();
        }
        return view("pages.articles.list", ['articles' => $article]);
    }

    public function edit($id)
    {
        $article = Article::findOrFail(id: $id);
        return view('pages.articles.edit', ['article' => $article, 'categories' => Category::all()]);
    }

    public function create(): View
    {
        return view('pages.articles.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $category = Category::find($request->category_id);
        if (!$category) {
            return redirect()->route('articles.index')->with('failed', 'Categor not found');
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            // Simpan gambar di folder storage/app/public/campaigns
            $imagePath = $request->file('image')->store('articles', 'public');
            // URL dari gambar
            $imagePath = asset('storage/' . $imagePath);
        }

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'category_id' => $category->id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article added successfully');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $article = Article::find($id);
        if (!$article) {
            return redirect()->route('articles.index')->with('failed', 'Article not found.');
        }

        $request->validate([
            'title' => 'string|max:255',
            'content' => 'string',
            'category_id' => 'numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $category = Category::find($request->category_id);
        if (!$category) {
            return redirect()->route('articles.index')->with('failed', 'Category not found');
        }

        $article->title = $request->title ?? $article->title;
        $article->content = $request->content ?? $article->content;
        $article->category_id = $request->category_id ?? $article->category_id;

        if ($request->hasFile('image')) {
            if ($article->image) {
                $oldImagePath = str_replace(asset('storage/'), '', $article->image);
                Storage::disk('public')->delete($oldImagePath);
            }

            $newImagePath = $request->file('image')->store('campaigns', 'public');
            $article->image = asset('storage/' . $newImagePath);
        }

        $article->save();
        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {

        if (auth()->user()->role == 'user') {
            $article = Article::find($id)->where('user_id', '=', auth()->user()->id);
        } else {
            $article = Article::find($id);
        }

        if ($article) {
            $article->delete();
            return redirect()->route('articles.index')
                ->with('success', 'Category is deleted successfully.');
        } else {
            return redirect()->route('articles.index')
                ->with('failed', 'Cannot Delete Category.');
        }
    }
}
