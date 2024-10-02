<?php

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = News::orderBy('created_at', 'desc')->take(4)->get();
        return view('home', compact('latestNews'));
    }
}
