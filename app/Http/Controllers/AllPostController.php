<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Commentaire;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AllPostController extends Controller
{
    private function getCategorie()
    {

        return Categorie::all();
    }


    public function index()
    {

        $route = Route::currentRouteName();

        $categories = $this->getCategorie();

        $posts = Post::where('etat', 1)->latest()->paginate(6);

        return view('layouts.allPost', compact('route', 'categories', 'posts'));
    }


    public function all_post_categorie($categorie_id)
    {

        $route = Route::currentRouteName();

        $categories = $this->getCategorie();


        $posts = Post::where('etat', 1)->where('categorie_id', $categorie_id)->latest()->paginate(6);

        return view('layouts.allPostCategorie', compact('route', 'categories', 'posts'));
    }

    public function show(Post $post)
    {
        $commentaires=Commentaire::where('post_id',$post->id)->get();

        $post_recommande=Categorie::find($post->categorie->id)->posts;
        return view('layouts.showPost', compact('post','post_recommande','commentaires'));
    }


}
