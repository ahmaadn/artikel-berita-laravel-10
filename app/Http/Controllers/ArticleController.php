<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index()
    {

    }

    public function show($id): View
    {
        return view('pages.articles.index');
    }

    public function latest(): View
    {
        return view('pages.articles.index');
    }
}
