@extends('layouts.app')

@section('content')

    @include('layouts.partials.header')

    <style>
        .info_annonce {
            padding-bottom: 10px;
        }

        .box{
            box-shadow: 0px 3px 18px rgba(0,0,0,0.08);
            background-color:#fff;
            padding-bottom: 10px;
        }
    </style>
    <div class="container" style="padding-right: 50px;">
        <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="breadcrumb-link" style="text-decoration: none;">Accueil</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('annonce') }}"
                                                                              class="breadcrumb-link"
                                                                              style="text-decoration: none;">Toutes les
                            annonces</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/" class="breadcrumb-link"
                                                                              style="text-decoration: none;">{{ $post->categorie->title }}</a>
                    </li>
                </ol>
            </nav>
            <hr>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 box">
                <div class="card-title" style="padding-top: 10px;">
                    <h3>{{ $post->title }}</h3>
                </div>
                <div class="card-title">
                    <div class="col-md-7" style="height: auto;">
                        <div style="text-align: center;  background-color: #f8f8f8;">
                            <img src="{{ asset('storage/'.$post->img_1) }}" alt="" style="height: 350px; width: 280px;">
                        </div>
                        <br>
                        <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-4"><a href="#"><img
                                    src="{{ asset('storage/'.$post->img_1) }}" style="width: 50px; height: 50px;"></a>
                        </div>
                        <div class="col-md-4  col-sm-4 col-lg-4 col-xl-4  col-xs-4"><a href="#"><img
                                    src="{{ asset('storage/'.$post->img_2) }}" style="width: 50px; height: 50px;"></a>
                        </div>
                        <div class="col-md-4  col-sm-4 col-lg-4 col-xl-4  col-xs-4"><a href="#"><img
                                    src="{{ asset('storage/'.$post->img_3) }}" style="width: 50px; height: 50px;"></a>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-title"><h3
                                    style="text-align: center; margin: auto; padding-top: 7px;">{{ $post->prix }}
                                    FCFA</h3></div>
                            <div class="card-body" style=" background-color: #f8f8f8;">
                                <div class="col-md-6 info_annonce">vendeur</div>
                                <div class="col-md-6  info_annonce"><b>{{ $post->user->name }}</b></div>

                                <div class="col-md-6  info_annonce">lieu</div>
                                <div class="col-md-6  info_annonce"><b>{{ $post->ville->title }}</b></div>

                                <div class="col-md-6  info_annonce">publie</div>
                                <div class="col-md-6  info_annonce"><b>{{ $post->created_at }}</b></div>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" style="border-radius: 3px; width: 250px;"> <span class="fa fa-phone"></span> afficher le telephone
                            </button>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" style="border-radius: 3px; width: 250px;"> <span class="fa fa-envelope"></span> contacter par mail
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    @include('layouts.partials.footer')
@endsection

