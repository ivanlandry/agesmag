<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Message;
use App\User;
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

    public function messages(Request $request)
    {
        $user = Auth::user();
        $posts = $user->posts;
        $messages = Message::where('user_id', $user->id)->get();
        $messages_recu = Message::where('destinataire_id', $user->id)->get();

        return view('layouts.mon_compte.message', compact('user', 'posts', 'messages', 'messages_recu'));
    }

    private function getMessage($destinataire)
    {
        $messages = Message::where('user_id', Auth::user()->id)->orwhere('user_id', $destinataire)->where('destinataire_id', $destinataire)->orwhere('destinataire_id', Auth::user()->id)->get();

        $content = "";

        foreach ($messages as $message) {

            if ($message->user_id != Auth::user()->id) {

                $content = $content . '
             <div class="containere content-message">
                <img src="' . asset("images/avatar.png") . '" alt="Avatar" style="width:100%;">
                <b>' . $message->expediteur_name . '</b>
                <p>' . $message->message . '</p>
                <span class="time-right">' . $message->created_at . '</span>
            </div>';
            } else {
                $content = $content . '<div class="containere darker  content-message">
                <img src="' . asset("images/avatar.png") . '" alt="Avatar" class="right" style="width:100%;">
                <b class="float-right">' . $message->expediteur_name . '</b>
                <p>' . $message->message . '</p>
                <span class="time-left">' . $message->created_at . '</span>
            </div>';
            }

        }

        return $content;
    }


    public function show_chat($destinataire)
    {

        $content = $this->getMessage($destinataire);

        return response()->json([$content, $destinataire]);
    }


    public function send_message(Request $request)
    {

        $destinataire_id = (int)$request->input('destinataire');

        Auth::user()->messages()->create([
            'expediteur_name' => Auth::user()->name,
            'destinataire_id' => $destinataire_id,
            'destinataire_name' => User::find($destinataire_id)->name,
            'message' => $request->input('message')
        ]);

        $content = $this->getMessage($destinataire_id);

        return response()->json($content);
    }


    public function paiement()
    {

        $user = Auth::user();
        $posts = $user->posts;


        Stripe::setApiKey('sk_test_51H18IPKvuB13xNWIfGOkRgDvX5CSGqBwAFkQo5c2KBeHCV3rQYoPWNJL5CyrpU1WErALXqbLm8208i0FhahbK25l006pXVV4br');

        $intent = PaymentIntent::create([
            'amount' => 50,
            'currency' => 'usd',

            'metadata' => ['integration_check' => 'accept_a_payment'],
        ]);

        $clientSecret = Arr::get($intent, 'client_secret');


        return view('layouts.mon_compte.paiement', compact('user', 'posts', 'clientSecret'));
    }

}
