@extends('layouts.mon_compte.mes_annonces')


@section('card')


    <div id="chat" class="row">

        <div class="col-md-12 card-menber">

            <div class="containere" style="background-color: white;">

                @foreach($messages as $message)

                    <a href="{{ route('show_chat',$message->destinataire_id) }}" style="text-decoration: none;"
                       class="show-chat">
                        <b style="color: black;">{{ $message->destinataire_name }}</b>
                        <img src="{{ asset('images/avatar.png') }}" alt="Avatar" style="width:100%;">
                        <p>{{ $message->message }}</p>
                        <span class="time-right fa fa-trash" style="color: red;"></span>
                    </a>
                    <br>
                    <hr>
                @endforeach


            </div>
        </div>


        <div class="col-md-8 card containere-chat"
             style="display: none; padding-bottom: 10px; border: 2px solid #dedede; border-radius: 5px; ^pa"
        >

            <div class=" chat-card" style=" display: none; padding-bottom: 0px;">

            </div>

            <form action="{{ route('send_message') }}" method="post" id="form-message" style="display: none;">
                @csrf
                <input id="message" type="text" class="form-control " style="border-radius: 0px; height: 50px;"
                       placeholder="messsage ..." name="message">
                <button type="submit" class="btn btn-primary float-right" style="width: 300px;">envoyer</button>
            </form>
        </div>
    </div>


@endsection


