<?php

namespace App\Http\Controllers;

use App\CategoriePost;
use App\Post;
use App\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store']);
    }

    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('admin.list_posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoriePost::all();
        $villes = Ville::orderBy('title', 'asc')->get();

        return view('layouts.newPost', compact('categories', 'villes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:9',
            'prix' => 'required',
            'img_1' => 'required|image|max:5000',
            'img_2' => 'required|image|max:5000',
            'img_3' => 'required|image|max:5000',
        ]);


        $user = Auth::user();

        $data['categorie_id'] = CategoriePost::where('title', $request->input('categorie'))->first()->id;
        $data['ville_id'] = Ville::where('title', $request->input('ville'))->first()->id;

        $post = $user->posts()->create($data);

        $this->storeImage($post);
    }


    private function storeImage(Post $post)
    {
        if (\request('img_1') and \request('img_2') and \request('img_3')) {

            $post->update([
                'img_1' => \request('img_1')->store('posts', 'public'),
                'img_2' => \request('img_2')->store('posts', 'public'),
                'img_3' => \request('img_3')->store('posts', 'public'),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.show_post',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
