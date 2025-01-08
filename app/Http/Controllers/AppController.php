<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppController extends Controller
{
    public function index(): View
    {
        return view("pages.home", ['articles' => Article::all(), 'categories' => Category::all()]);
    }
    public function about(): View
    {
        return view("pages.about");
    }
    public function latestNews(): View
    {
        return view("pages.latest_news");
    }
}
