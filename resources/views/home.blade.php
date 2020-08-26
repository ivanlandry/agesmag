@extends('layouts.app')

@section('extra-css')

    <style>
        h6 {
            text-align: center;
            margin: auto;
            padding-top: 7px;
            font-weight: bold;
            font-size: 25px;
        }
    </style>

@endsection

@section('content')


    @include('layouts.partials.header')

    @if(session()->has('message'))
        <div class="container">
            <div class="alert alert-success text-center">
                <span>{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif



    <div class="container">

        <div class="row bg-light">
            <div id="carouselExampleIndicators" class="carousel slide col-md-12" data-ride="carousel" style="border: 1px solid whitesmoke;">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/slide.jpg') }}" style="height: 300px; width: 100%;" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img  src="{{ asset('images/slide1.jpg') }}" style="height: 300px; width: 100%;" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img  src="{{ asset('images/slide2.jpg') }}" style="height: 300px; width: 100%;" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <br><br>

        <div class="row">
            <div class="col-md-3">
                @include('layouts.partials.search_bar')
                <br><br>
                <div class="card">
                    <div class="card-header">categories</div>
                    <ul class="list-group list-group-flush">
                        @foreach($categories as $categorie)
                            <li class="list-group-item"><a href="{{ route('annonce_categorie',$categorie->id) }}"
                                                           style="text-decoration: none;">{{ $categorie->title }}  ({{count($categorie->posts)}})</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-9  box">
                <div style="padding: 10px 14px 15px 14px;">
                    <div class="float-left">
                        <b>Annonces recentes</b>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('annonce') }}"
                           style="font: 14px 'Helvetica Neue' Roboto Helvetica; color: #0A6EAD; text-decoration: none;">Toutes
                            les annonces</a>
                    </div>
                </div>
                <br>


                @foreach($post_recents as $p)

                    <div class="col-md-3" style="padding-bottom: 50px;">

                        <a href="{{ route('showPost',$p) }}">
                            <img style="height: 150px; width: 100%;"
                                 src="{{ asset('storage/'.$p->img_1) }}">
                        </a>
                        <br>

                        <b><a href="{{ route('showPost',$p) }}"
                              style="text-decoration: none;">{{ $p->title }}</a></b><br>
                        <b>{{ $p->prix }} FCFA</b>
                    </div>


                @endforeach
            </div>
        </div>
    </div>

    <br><br>



    <h6>Qu'avez-vous à vendre ?<br><br>
        <a href="{{ route('post.create') }}" class="btn btn-primary"
           style="height: 40px; width: 250px;font-size: 20px;">publier votre annonce</a>
    </h6>
    <br><br>

    @include('layouts.partials.footer')
@endsection
