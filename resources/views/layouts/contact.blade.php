@extends('layouts.app')

@section('content')

    @include('layouts.partials.header')


    <div class="container">
        <div class="row">
            <div style="border:2px solid whitesmoke; padding:20px 20px 20px 20px;" class="col-md-9 col-md-offset-1">
                <div class="d-flex justify-content-between">
                    ddddddddddd
                </div>
                <div class="d-flex justify-content-end">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div >
                            <h3 style="text-align: center"><b>laisser un message</b></h3>
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
                    </form>
                </div>
            </div>
        </div>

    </div>


    @include('layouts.partials.footer')

@endsection
