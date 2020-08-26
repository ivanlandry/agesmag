@extends('layouts.app')
@section('extra-css')

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

@endsection

@section('content')

    @include('layouts.partials.header')


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

                        <div class="contact_chat_message" style="display: none;">
                            @guest
                                <div class="alert alert-success text-center">
                                    <span>vous devez vous connecter</span>
                                </div>
                            @else
                                <hr>
                                <br>
                                <form action="{{ route('chat_message') }}" method="POST">
                                    @csrf
                                    <h3><b> Envoyer un message à {{ $post->user->name }} </b></h3>

                                    <div class="form-group" style="display: none;">
                                        <input type="text" value="{{ $post->user->id }}" name="id_destinataire">
                                    </div>
                                    <div class="form-group" style="display: none;">
                                        <input type="text" value="{{ $post->user->name }}" name="name_destinataire">
                                    </div>
                                    <div class="form-group">
                                    <textarea class="form-control" placeholder="message"
                                              style="height: 100px;" name="message"></textarea>
                                    </div>

                                    <input type="submit" value="envoyer">
                                </form>
                            @endguest
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
                            <button type="submit" class="button_chat" id="button_chat"><span
                                    class=""></span> envoyer un message
                            </button>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="button_contact_product" id="button_contact_product_email"><span
                                    class="fa fa-envelope"></span> contacter par mail
                            </button>
                        </div>

                        <hr style="width: 250px;">

                        <div class="d-flex justify-content-center">
                            <form action="{{ route('add_favoris',$post) }}" id="add_favoris">
                                <button type="submit" class="btn"
                                        style=" text-transform:lowercase;width:250px;color:rgb(10,110,176); border: 1px solid rgb(10,110,176); font-weight: normal!important; background-image: linear-gradient(to bottom, #f6f6f6 0%,#e8e8eb 100%)">
                                    <span id="heart" class="fa fa-heart" style="color: darkgrey;"></span> Ajouter aux
                                    favoris
                                </button>
                            </form>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">

                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <span
                                style="font-size: 20px; color:rgb(10,110,176); padding-right: 10px; padding-top: 10px;"
                                class="fa fa-share-alt"></span>
                            <div class="addthis_inline_share_toolbox"></div>

                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-10 col-md-offset-1" style="padding-top: 20px;">
                <div id="map">
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1 box" style="padding-top: 20px;">
                <div class="col-md-2 col-md-offset-8">
                    <a href="#" style="text-decoration: none;color: black;"><span><span id="nb_commentaire"> {{ count($commentaires) }}</span> commentaires</span></a>
                </div>
                <br>
                <hr>
                @foreach($commentaires as $commentaire)
                    <div class="col-md-12">
                        <div class="col-md-2">
                            <span class="fa fa-user text-primary" style="font-size: 20px;"></span> <span
                                class="text-primary">{{ $commentaire->user->name }}  </span>
                        </div>
                        <div class="col-md-6" >
                            <b>{{ $commentaire->commentaire }}</b>
                        </div>
                        <div class="col-md-3">
                            posté le {{ $commentaire->created_at->format('d/m/Y à H:m') }}
                        </div>
                    </div><br><br>
                @endforeach

                <div class="col-md-12">
                    <div class="col-md-2">
                        <span class="fa fa-user text-primary" style="font-size: 20px;"></span>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="votre commentaire ..." id="commentaire">
                    </div>
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


@endsection


@section('extra-script')

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKfKWQQf9yv02PAZZHSOyHvXzHQ5jLOKI&callback=initMap">
    </script>

    <script>

        function initMap() {

            var apiKey = "16cb5239b9e547629a662358e226b73a";

            var request = axios.get("https://api.opencagedata.com/geocode/v1/json?q={{ $post->ville }}&key=" + apiKey + "&pretty=1");


            request.then(response => {

                console.log(response.data);

                var map = new google.maps.Map(
                    document.getElementById('map'), {zoom: 15, center: response.data.results[2].geometry});
                // The marker, positioned at Uluru
                var marker = new google.maps.Marker({position: response.data.results[2].geometry, map: map});
            });

        }

        $(function () {

            $('#commentaire').keypress(function (event) {

                var keycode = (event.keyCode ? event.keyCode : event.which);

                if (keycode == '13') {

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/postcommentaire',
                        method: 'post',
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'commentaire': $(this).val(),
                            'post': '{{ $post->id }}'
                        }

                    }).done((function (data) {
                        if (data == "auth") {
                            alert('authentification requis ');
                        } else {
                            $('#nb_commentaire').text(data['nb_commentaire']);
                        }

                    })).fail(function (error) {
                        console.log(error);
                    });

                }
            });

            $('#button_contact_product_email').on('click', function (event) {
                event.preventDefault();
                $('.contact_single_product_email').show();
            });

            $('#button_chat').on('click', function (event) {
                event.preventDefault();
                $('.contact_chat_message').show();
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

        $('#add_favoris').on('submit', function (event) {
            event.preventDefault();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "get",
                url: $(this).attr('action'),
                dataType: "json",

            }).done((function (data) {

                if (data == "succes") {
                    $('#heart').css({
                        color: '#EE8877'
                    });
                } else {
                    $('#heart').css({
                        color: 'darkgrey'
                    });
                }

            })).fail(function (error) {
                console.log(error);
            });

        });

    </script>


@endsection
