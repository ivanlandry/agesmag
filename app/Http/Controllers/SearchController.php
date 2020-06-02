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
        if ($request->ajax()) {

            if ($request['type'] == "categorie") {

                $posts = Categorie::find($request['val'])->posts;

                return response()->json($posts);
            } else {
                $posts = Ville::find($request['val'])->posts;

                return response()->json($posts);
            }
        }
        abort(404);
    }
}
