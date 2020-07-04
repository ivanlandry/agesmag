<?php

namespace App\Http\Controllers;

use App\Mail\MessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function sendEmail(Request $request)
    {
        $nom = "";
        $email = "";
        $message = "";
        $email_destinataire = "";

        if (Auth::user()) {

            $nom = Auth::user()->name;
            $email = Auth::user()->email;

        } else {
            $nom = $request->input('nom');
            $email = $request->input('email');
        }

        $email_destinataire = $request->input('email_destinataire');

        $message = $request->input('message');

        Mail::to($email_destinataire)->send(new MessageMail($nom, $email, $message));

        session()->flash('message', 'votre message a bien été envoyé');

        return back();
    }

    public function chat_message(Request $request)
    {

        $content_message = $request->input('message');
        $id_destinataire = $request->input('id_destinataire');
        $name_destinataire = $request->input('name_destinataire');

        Auth::user()->messages()->create([
            'expediteur_name' => Auth::user()->name,
            'destinataire_id' => $id_destinataire,
            'destinataire_name' => $name_destinataire,
            'message' => $content_message
        ]);

        session()->flash('message', 'votre message a bien été envoyé');

        return back();

    }
}

