<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Post;
use App\Ville;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $search=$request->input('search');
        $categorie=$request->input('categorie');

       $posts=Post::where('title', 'LIKE', "%{$search}%")->orWhere('ville', 'LIKE', "%{$search}%")->get();

       $categories=Categorie::all();
        return view('layouts.search',compact('posts','categories','search'));
    }
}
