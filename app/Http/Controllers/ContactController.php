<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

    }

    public function  create(){

        return view('layouts.contact');
    }

    public function store(Request $request){

    }

    public function show(Contact $contact){

    }

    public function destroy(Contact $contact){

    }
}
