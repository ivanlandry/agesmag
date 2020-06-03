<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Post;
use App\Ville;
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

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        // dd($this->dateDiff(time(), strtotime('2020-06-02 19:20:49')));

        $post_recents = array();

        $categories = Categorie::all();
        $villes = Ville::all();

        $posts = Post::all();

        foreach ($posts as $post) {
            if ($this->dateDiff(time(), strtotime($post['created_at']))['day'] <= 2) {
                $post_recents[] = $post;
            }
        }

        return view('home', compact('villes', 'categories', 'post_recents'));
    }

    private function dateDiff($date1, $date2)
    {

        $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
        $retour = array();

        $tmp = $diff;
        $retour['second'] = $tmp % 60;

        $tmp = floor(($tmp - $retour['second']) / 60);
        $retour['minute'] = $tmp % 60;

        $tmp = floor(($tmp - $retour['minute']) / 60);
        $retour['hour'] = $tmp % 24;

        $tmp = floor(($tmp - $retour['hour']) / 24);
        $retour['day'] = $tmp;

        return $retour;
    }
}
