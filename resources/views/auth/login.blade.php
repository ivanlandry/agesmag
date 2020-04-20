@extends('layouts.app')

@include('layouts.partials.header')

@section('content')

    <div class="container">
        <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="breadcrumb-link">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">se connecter</li>
                </ol>
            </nav>
        </div>
    </div>

    <div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-md-offset-3">
                        <div style="border:2px solid whitesmoke; padding:50px 100px 50px 100px;">
                            <h3 style="text-align: center"><b>Se connecter</b></h3>
                            <label for="nom"><b>Adresse email</b></label>
                            <div>
                                <input type="email" id="inputEmail"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       placeholder="Email address"
                                       required="" autofocus="">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="password"><b>Mot de passe</b></label>
                            </div>
                            <div>
                                <input type="password" id="inputPassword"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       placeholder="Password"
                                       required="">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember" style="padding-left: 20px;">
                                    se souvenir de moi
                                </label>
                            </div>
                            <br>
                            <div class="clearfix">
                                <button class=" btn-block" type="submit">
                                    connexion
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

    @include('layouts.partials.footer')
@endsection

