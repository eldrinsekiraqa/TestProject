<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\User;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Articles::all();


        return view('home.index')->with('articles', $articles);
    }

    public function show($id){
        $article = Articles::findOrFail($id);

        return view('home.show')->with('article',$article);
    }
}
