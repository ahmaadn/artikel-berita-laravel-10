<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AppController extends Controller
{
    public function index(): View
    {
        return view("pages.home");
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
