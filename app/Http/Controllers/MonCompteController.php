<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonCompteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function mes_annonces()
    {
        $user = Auth::user();
        $posts = $user->posts;

        return view('layouts.mon_compte.mes_annonces', compact('user', 'posts'));
    }

    public function parametre()
    {
        $user = Auth::user();
        $posts = $user->posts;
        return view('layouts.mon_compte.parametre', compact('user', 'posts'));
    }

    public function modif_infos(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->input('nom');
        $user->tel = $request->input('tel');
        $user->email = $request->input('email');
        $user->save();

        session()->flash('message', 'votre compte a bien été mis à jour');

        return redirect()->back();
    }

    public function modif_paasword(Request $request)
    {
        $user = Auth::user();

        return redirect()->back();
    }
}
