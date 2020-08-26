<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Message;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


        $posts = Post::all();

        foreach ($posts as $post) {
            if ($this->dateDiff(strtotime($post['created_at']),time())['hour'] < 24) {
                $post_recents[] = $post;
            }
        }


        return view('home', compact( 'categories', 'post_recents'));
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
