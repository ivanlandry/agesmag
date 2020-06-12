<?php

namespace App\Http\Controllers\admin;

use App\Categorie;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){

        $user=Auth::user();
        $users=User::all();

        $posts=$user->posts;
        $post_en_ligne=Post::where('etat','1')->get();
        $post_en_attente=Post::where('etat','0')->get();

        $categorie=Categorie::all();




        return view('admin.home',compact('auth','posts','categorie','post_en_ligne','post_en_attente','users'));
    }
}
