<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return "Selamat Datang";
    }

    public function about()
    {
        return "2341720094";
    }
    public function showArticle($articleId)
    {
        return "Halaman Artikel dengan ID " . $articleId;
    }
}
