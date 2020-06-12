@extends('layouts.app')


@section('content')

    <style>
        h6 {
            text-align: center;
            margin: auto;
            padding-top: 7px;
            font-weight: bold;
            font-size: 25px;
        }
    </style>

    @include('layouts.partials.header')

    @if(session()->has('message'))
        <div class="container">
            <div class="alert alert-success text-center">
                <span >{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif


    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.partials.search_bar')
            </div>
            <div class="col-md-9  box">
                <div  style="padding: 10px 14px 15px 14px;">
                    <div class="float-left">
                        <b>Annonces recentes</b>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('annonce') }}" style="font: 14px 'Helvetica Neue' Roboto Helvetica; color: #0A6EAD; text-decoration: none;">Toutes les annonces</a>
                    </div>
                </div>
                <br>
                @foreach($post_recents as $p)

                    <div class="col-md-4">

                        <a href="{{ route('showPost',$p) }}">
                            <img style="height: 150px; width: 100%;"
                                 src="{{ asset('storage/'.$p->img_1) }}">
                        </a>
                        <br>

                        <b><a href="{{ route('showPost',$p) }}" style="text-decoration: none;">{{ $p->title }}</a></b><br>
                        <b>{{ $p->prix }} FCFA</b>
                    </div>
                    <div class="col-md-3">

                        <a href="{{ route('showPost',$p) }}">
                            <img style="height: 150px; width: 100%;"
                                 src="{{ asset('storage/'.$p->img_1) }}">
                        </a>
                        <br>

                        <b><a href="{{ route('showPost',$p) }}" style="text-decoration: none;">{{ $p->title }}</a></b><br>
                        <b>{{ $p->prix }} FCFA</b>
                    </div>
                    <div class="col-md-3">

                        <a href="{{ route('showPost',$p) }}">
                            <img style="height: 150px; width: 100%;"
                                 src="{{ asset('storage/'.$p->img_1) }}">
                        </a>
                        <br>

                        <b><a href="{{ route('showPost',$p) }}" style="text-decoration: none;">{{ $p->title }}</a></b><br>
                        <b>{{ $p->prix }} FCFA</b>
                    </div>

                    <div class="col-md-3">

                        <a href="{{ route('showPost',$p) }}">
                            <img style="height: 150px; width: 100%;"
                                 src="{{ asset('storage/'.$p->img_1) }}">
                        </a>
                        <br>

                        <b><a href="{{ route('showPost',$p) }}" style="text-decoration: none;">{{ $p->title }}</a></b><br>
                        <b>{{ $p->prix }} FCFA</b>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

    <br><br>



    <h6>Qu'avez-vous à vendre ?<br><br>
        <a href="{{ route('post.create') }}" class="btn btn-primary" style="height: 40px; width: 250px;font-size: 20px;">publier votre annonce</a>
    </h6>
    <br><br>

    @include('layouts.partials.footer')
@endsection
