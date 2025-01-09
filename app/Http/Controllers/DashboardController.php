<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        if (auth()->user()->role != 'admin') {
            $article = Article::where('user_id', '=', auth()->user()->id)->get()->take(10);
        } else {
            $article = Article::get()->take(10);
        }
        return view("pages.dashboard.home", ['articles' => $article]);
    }
}
