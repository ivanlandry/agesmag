<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Post;
use App\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AllPostController extends Controller
{
    private function getCategorie()
    {

        return Categorie::all();
    }

    private function getVille()
    {
        return Ville::orderBy('title', 'asc')->get();
    }

    public function index()
    {

        $route = Route::currentRouteName();

        $categories = $this->getCategorie();
        $villes = $this->getVille();
        $posts = Post::where('etat', 1)->latest()->paginate(6);

        return view('layouts.allPost', compact('route', 'categories', 'villes', 'posts'));
    }

    public function all_post_categorie($categorie_id)
    {

        $route = Route::currentRouteName();

        $categories = $this->getCategorie();
        $villes = $this->getVille();

        $posts = Post::where('etat', 1)->where('categorie_id', $categorie_id)->latest()->paginate(6);

        return view('layouts.allPostCategorie', compact('route', 'categories', 'villes', 'posts'));
    }

    public function show(Post $post)
    {

        return view('layouts.showPost', compact('post'));
    }


}
