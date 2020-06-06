@extends('layouts.app')

@section('content')

    @include('layouts.partials.header')

    <style>
        .info_annonce {
            padding-bottom: 10px;
        }

        .box {
            box-shadow: 0px 3px 18px rgba(0, 0, 0, 0.08);
            background-color: #fff;
            padding-bottom: 10px;
            height: auto;
        }

        .img {
            width: 50px;
            height: 50px;
            cursor: pointer;
        }

        h6 {
            text-align: center;
            margin: auto;
            padding-top: 7px;
            font-weight: bold;
            font-size: 25px;
        }

        .single_title {
            margin: auto;
            padding-top: 7px;
            font-weight: bold;
            font-size: 25px;
        }

        .button_contact_product {
            border-radius: 3px;
            width: 250px;
        }

        #map {
            height: 400px; /* The height is 400 pixels */
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
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('annonce_categorie',$post->categorie->id) }}" class="breadcrumb-link"
                            style="text-decoration: none;">{{ $post->categorie->title }}</a>
                    </li>
                </ol>
            </nav>
            <hr>
        </div>
    </div>


    @if(session()->has('message'))

        <div class="container">
            <div class="alert alert-success text-center col-md-10 col-md-offset-1">
                <span>{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 box">
                <div class="card-title" style="padding-top: 10px;">
                    <h5 class="single_title">{{ $post->title }}</h5><br>
                </div>
                <div>
                    <div class="col-md-7">
                        <div style="text-align: center;  background-color: #f8f8f8;height: 350px;">
                            <img src="{{ asset('storage/'.$post->img_1) }}" alt="{{ $post->title }}"
                                 style="height: 350px;" id="image_active">
                        </div>
                        <br>
                        <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-4">
                            <img style="border: 2px solid blue; opacity: 0.5;"
                                 src="{{ asset('storage/'.$post->img_1) }}" class="img">
                        </div>
                        <div class="col-md-4  col-sm-4 col-lg-4 col-xl-4  col-xs-4">
                            <img src="{{ asset('storage/'.$post->img_2) }}" class="img">
                        </div>
                        <div class="col-md-4  col-sm-4 col-lg-4 col-xl-4  col-xs-4">
                            <img src="{{ asset('storage/'.$post->img_3) }}" class="img">
                        </div>
                        <div style="padding-top: 70px;">
                            <h4><b> description :</b></h4>
                            <span>{{ $post->description }}</span>
                        </div>
                        <div class="contact_single_product_email" style="display: none;">
                            <hr>
                            <br>
                            <form action="{{ route('message_email') }}" method="POST">
                                @csrf
                                <h3><b> Envoyer un message à {{ $post->user->name }} </b></h3>

                                @guest
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="nom" name="nom">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="adresse email"
                                               name="email">
                                    </div>
                                @endguest

                                <div class="form-group" style="display: none;">
                                    <input type="text" value="{{ $post->user->email }}" name="email_destinataire">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="message"
                                              style="height: 100px;" name="message"></textarea>
                                </div>

                                <input type="submit" value="envoyer un message">
                            </form>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-title"><h6>{{ $post->prix }}
                                    FCFA</h6></div>
                            <div class="card-body" style=" background-color: #fbfbfb">
                                <div class="col-md-6 info_annonce">vendeur</div>
                                <div class="col-md-6  info_annonce"><b>{{ $post->user->name }}</b></div>

                                <div class="col-md-6  info_annonce">lieu</div>
                                <div class="col-md-6  info_annonce"><b>{{ $post->ville }}</b></div>

                                <div class="col-md-6  info_annonce">publie</div>
                                <div class="col-md-6  info_annonce"><b>{{ $post->created_at }}</b></div>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="button_contact_product" id="button_contact_product_phone"><span
                                    class="fa fa-phone"></span> afficher le telephone
                            </button>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="button_contact_product" id="button_contact_product_email"><span
                                    class="fa fa-envelope"></span> contacter par mail
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-10 col-md-offset-1" style="padding-top: 20px;">
                <div id="map">

                </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 box">

                <div class="card-title" style="padding-top: 10px;">
                    <b>Annonces recommandées</b><br>
                </div>

                @foreach($post_recommande as $p)

                    <div class="col-md-3">

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


    <h6>Qu'avez-vous à vendre ?<br><br>
        <a href="{{ route('post.create') }}" class="btn btn-primary"
           style="height: 40px; width: 250px;font-size: 20px;">publier votre annonce</a>
    </h6>
    <br><br>
    @include('layouts.partials.footer')

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKfKWQQf9yv02PAZZHSOyHvXzHQ5jLOKI&callback=initMap">
    </script>

    <script>


        function initMap() {
            // The location of Uluru
            var uluru = {lat: 5.4876118, lng: 10.4100709};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 15, center: uluru});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});
        }


        $(function () {

            $('#button_contact_product_email').on('click', function (event) {
                event.preventDefault();
                $('.contact_single_product_email').show();
            });

            $('#button_contact_product_phone').on('click', function (event) {
                event.preventDefault();
            });

            $('.img').click(function (event) {


                $('.img').css({
                    border: 'none',
                    opacity: '1'
                });

                $('#image_active').attr('src', $(this).attr('src'));

                $(this).css({
                    border: '2px solid blue',
                    opacity: '0.5'
                });
            });
        });

    </script>
@endsection

