<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Article;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $hasLike = Like::where("article_id", '=', $article->id)->where("user_id", '=', auth()->user()->id)->exists();

        if (!$hasLike) {
            $like = Like::create([
                'user_id' => $request->user()->id,
                'article_id' => $article->id,
            ]);
        }
        // return response()->json(['likes_count' => $article->likes->count()], 201);
        return response()->json(['likes_count' => $article->likes->count()], 201);
    }

    public function destroy(Request $request, Article $article)
    {
        $like = Like::where("article_id", '=', $article->id)->where("user_id", '=', auth()->user()->id)
            ->first();

        if ($like) {
            $like->delete();
        }
        return response()->json(['likes_count' => $article->likes->count()], 201);
    }
}
