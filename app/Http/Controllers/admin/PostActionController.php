<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\PostMail;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostActionController extends Controller
{



    public function valider($post, $user_id)
    {

        $_post = Post::find($post);
        $_post->etat = 1;
        $_post->save();


        $posts = Post::orderBy('etat', 'desc')->orderBy('created_at', 'desc')->latest()->paginate(10);

        $user_email = User::where('id', $user_id)->value('email');

        Mail::to($user_email)->send(new PostMail("votre annonce a bien ete publiée"));

        return redirect()->route('post.index', [$posts]);
    }

    public function rejeter($post, $user_id)
    {

        Post::destroy($post);

        $posts = Post::orderBy('etat', 'desc')->orderBy('created_at', 'desc')->latest()->paginate(10);

        $user_email = User::where('id', $user_id)->value('email');

        Mail::to($user_email)->send(new PostMail("votre annonce a été supprimé car elle ne respectent pas les conditions de publication"));

        return redirect()->route('post.index', [$posts]);

    }

}
