<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $article_id): RedirectResponse
    {
        $article = Article::findOrFail($article_id);

        if (!Auth::check()) {
            return redirect()->route('auth.login')->with('failed', "Kamu harus login terlebih dahulu");
        }

        $request->validate([
            'messange' => 'required|string|max:300'
        ]);

        $comment = Comment::create([
            'user_id' => auth()->user()->id,
            'article_id' => $article->id,
            'messange' => $request->messange,
        ]);

        return redirect()->route('articles.detail', [$article->id])->with('success', "Komentar berhasil di tambahkan");
    }
}
