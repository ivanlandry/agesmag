@extends('layouts.app')

@section('content')

    @include('.layouts.partials.header')

    <div class="container" style="padding-right: 50px;">
        <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="breadcrumb-link">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">creer un compte</li>
                </ol>
            </nav>
        </div>
    </div>

    <form method="POST" action="{{ route('register') }}">

        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box_auth">
                        <h3 align="center"><b>Pas encore menbre?<br>Inscrivez vous grtuitement !</b></h3>
                        <hr>
                        <label for="nom"><b>Nom</b></label>
                        <div>
                            <input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                                   placeholder="Nom" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <label for="email"><b>Adresse email</b></label>
                        <div>
                            <input class="form-control @error('email') is-invalid @enderror" name="email" type="email"
                                   placeholder=" addresse email" required
                            >
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <label for="phone"><b>Numero de telephone</b></label>
                        <div>
                        <input class="form-control @error('tel') is-invalid @enderror" type="text"  id="tel"
                               placeholder="numero de telephone" required name="tel">
                            @error('tel')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <label for="password"><b>Mot de passe</b></label>
                        <div>
                            <input name="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                   type="password" placeholder="mot de passe"
                                   required=""
                            >
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <label for="">confirmer le mot de passe</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required autocomplete="new-password">

                        <div class="clearfix">
                            <button class="btn-block" type="submit">
                                creer un
                                compte
                            </button>
                        </div>

                    </div>
                    <br><br>
                    <p align="center">Deja inscrit? <a href="{{ route('login')  }}"
                                                       style="color:dodgerblue;text-decoration: none;">connectez
                            vous maintenant!</a>.</p>
                </div>


            </div>
        </div>

    </form>

    @include('layouts.partials.footer')
@endsection


