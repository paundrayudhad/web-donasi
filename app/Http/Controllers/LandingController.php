<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Campaign;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //
    public function index()
    {
        //Mengambil data dari model Campaign dan menyimpannya ke dalam variabel $campaigns. 
        $campaigns = Campaign::latest()->take(4)->get();
        $articles = Article::latest()->take(3)->get();

        //Return the view of the landing page adalah menentukan view yang akan di tampilkan ketika user mengakses route tertentu.
        //Compact adalah fungsi yang digunakan untuk mengirimkan data dari controller ke view.
        return view('pages.landing', compact('campaigns', 'articles')); ;
    }
}
