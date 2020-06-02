<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Post;
use App\User;
use App\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    private function getPost()
    {

        return Post::orderBy('etat', 'asc')->orderBy('created_at', 'desc')->latest()->paginate(10);
    }


    public function index()
    {
        $posts = $this->getPost();

        return view('admin.list_posts', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = Categorie::all();
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

        $user = "";

        if (Auth::user()) {
            $user = Auth::user();
        } else {
            $data_user['name'] = $request->input('nom');
            $data_user['email'] = $request->input('email');
            $data_user['tel'] = $request->input('tel');
            $data_user['password'] = Hash::make($request->input('password'));

            $user = User::create($data_user);
        }


        $categorie = Categorie::where('title', $request->input('categorie'))->first()->id;
        $ville = Ville::where('title', $request->input('ville'))->first()->id;

        $post = $user->posts()->create($data);
        $post->categorie()->associate($categorie);
        $post->ville()->associate($ville);
        $this->storeImage($post);

        session()->flash('message', 'votre annonce a bien été posté');

        return redirect()->route("post.create");
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
        return view('admin.show_post', compact('post'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

       /* Storage::delete('public/posts/' . $post->img_1);
        Storage::delete('public/posts/' . $post->img_2);
        Storage::delete('public/posts/' . $post->img_3);  */

        return redirect()->route('post.index', [$this->getPost()]);
    }
}
