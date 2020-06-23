@extends('layouts.app')

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
                        <li class="list-group-item" ><a href="{{ route('mes-annonces') }}" style="text-decoration: none;"><i class ="fa fa-book"></i> mes annonces</a></li>
                        <li class="list-group-item"><a href="{{ route('parametres') }}" style="text-decoration: none;"><i class ="fa fa-cogs"></i> Parametres</a></li>
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

                            @foreach($posts as $post)
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
