<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index()
    {
        //
        $articles = Article::latest()->paginate(6);
        return view('pages.article.index', compact('articles'));
    }

    public function show($slug)
    {
        //
        $article = Article::where('slug', $slug)->first();//mencari artikel berdasarkan slug di mana mengambul data pertama
        return view('pages.article.show', compact('article'));
    }
}
