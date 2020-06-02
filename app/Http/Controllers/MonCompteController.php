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
        $user=Auth::user();
        return view('layouts.mon_compte.mes_annonces',compact('user'));
    }
}
