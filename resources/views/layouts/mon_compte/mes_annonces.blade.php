@extends('layouts.app')

@section('extra-css')

    <style>
        #chat .containere {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        #chat .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        #chat .containere::after {
            content: "";
            clear: both;
            display: table;
        }

        .containere img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .containere img.right {
            float: right;
            margin-left: 20px;
            margin-right: 0;
        }

        .time-right {
            float: right;
            color: #aaa;
        }

        .time-left {
            float: left;
            color: #999;
        }
    </style>

    <style>
        .form-box {
            background: transparent;
            border: 1px solid #DDD;
            position: relative;
            margin: 0 0 40px;
            padding: 15px 18px 7px;
            word-wrap: break-word;
        }

        .button-info, .button-password {
            display: none;
        }

    </style>


@endsection


@section('content')

    @include('layouts.partials.header')

    <div class="container" style="padding-right: 50px; padding-top: 0;"
         xmlns:text-decoration="http://www.w3.org/1999/xhtml">
        <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="breadcrumb-link">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('mes-annonces') }}">Mon
                            compte</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="card" style="padding-right: 10px;">
                    <div class="card-title text-center">
                        <div style="font-size: 80px;padding: 20px 0 10px 0;">
                            <img src="{{ asset('images/avatar.png') }}" alt="">
                        </div>
                        <div class="card-text">{{ $user->name }}</div>
                        <hr>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" ><a href="{{ route('messages') }}" style="text-decoration: none;"><i class ="fa fa-envelope"><span class="badge badge-danger">4</span></i>  messages</a></li>
                        <li class="list-group-item" ><a href="{{ route('mes-annonces') }}" style="text-decoration: none;"><i class ="fa fa-heart"><span class="badge badge-danger">4</span></i>  favoris</a></li>
                        <li class="list-group-item" ><a href="{{ route('mes-annonces') }}" style="text-decoration: none;"><i class ="fa fa-book"></i> mes annonces</a></li>
                        <li class="list-group-item"><a href="{{ route('parametres') }}" style="text-decoration: none;"><i class ="fa fa-cogs"></i> Parametres</a></li>
                        <li class="list-group-item"><a href="{{ route('paiement') }}" style="text-decoration: none;"><i class ="fa fa-cogs"></i> Passer premium</a></li>
                        <li class="list-group-item">
                            <a href="{{ route('logout') }}" style="text-decoration: none;"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class ="fa fa-power-off"></i> Deconnexion</a>
                            <form id="logout-form" method="POST" action="{{ route('logout')  }}" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10" style="padding-right: 50px;">


                @section('card')
                    <div class="card">
                        <div class="card-title">
                            <h3 style="text-align: center; padding: 10px 0 0 0;">Toutes mes annonces</h3>
                        </div>

                        <table class="table table-striped table-responsive-xl table-responsive-sm table-responsive-lg">
                            <thead>
                            <tr>
                                <th scope="col">Annonce</th>
                                <th scope="col">Categorie</th>
                                <th scope="col">date de creation</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($posts ?? '' as $post)
                                <tr>
                                    <th>
                                        <img src="{{ asset('storage/'.$post->img_1) }}" alt="" height="50" width="50">
                                        <span>{{ $post->title }}</span>
                                    </th>
                                    <td>{{ $post->categorie->title }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                        <span class="badge">
                                            @if($post->etat==1)
                                                en ligne
                                            @else
                                                en attente
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{ route('post.destroy',$post) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input style="background-color: red;" type="submit" value="supprimer" class="btn btn-danger"/>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @show
            </div>
        </div>
    </div>

    @include('layouts.partials.footer')

@endsection


@section('extra-script')
    <script src="https://js.stripe.com/v3/"></script>

   @yield('paiement')

    <script>
        $(function () {

            $('.modif-info').click(function (event) {

                event.preventDefault();

                $('#nom , #tel , #email').prop('disabled', false);

                $('.button-info').show();
            });

            $('.modif-password').click(function (event) {

                event.preventDefault();

                $('#password').prop('disabled', false);

                $('.button-password').show();
            });


        });
    </script>

    <script>

        $(function () {
            var destinataire = "";

            $('.show-chat').on('click', function (e) {

                e.preventDefault();
                $('.containere-chat').show();

                $.ajax({

                    method: "get",
                    url: $(this).attr('href'),
                    dataType: "json",

                }).done((function (data) {

                    $('.card-menber').removeClass('col-md-12').addClass('col-md-4');

                    $('.chat-card').html(data[0]);
                    destinataire = data[1];
                    $('#form-message').show();

                    $('.chat-card').show(500);


                })).fail(function (error) {
                    console.log(error);
                });

            });

            $('#form-message').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    method: "post",
                    url: $(this).attr('action'),
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "message": $('#message').val(),
                        "destinataire": destinataire
                    },
                    dataType: "json",
                }).done(function (data) {

                    $('.chat-card').html(data);
                    $('#message').val('');

                }).fail(function (error) {
                    console.log(error);
                });


            });
        });

    </script>

@endsection
