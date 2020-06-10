@extends('layouts.mon_compte.mes_annonces')

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


@section('card')

    @if(session()->has('message'))
        <div class="alert alert-success text-center">
            <span >{{ session()->get('message') }}</span>
        </div>
    @endif

    <div class="card">

        <div class="row" style="padding: 20px 20px 0 20px;">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6"><h4><b>informations</b></h4></div>
                    <div class="col-md-3 col-md-offset-3"><a href="" class="modif-info"><i class="fa fa-edit"></i>
                            Modifier</a></div>
                </div>
                <form action="{{ route('modif_infos') }}" method="post" class="form-box">
                    @csrf
                    <div class="form-group">
                        <label>Votre nom :</label>
                        <input disabled type="text" class="form-control" value="{{ $user->name }}" required name="nom"
                               id="nom">
                    </div>
                    <div class="form-group">
                        <label>Votre numero de telephone :</label>
                        <input disabled type="text" class="form-control" value="{{ $user->tel }}" required name="tel"
                               id="tel">
                    </div>
                    <div class="form-group">
                        <label>Votre adresse email</label>
                        <input disabled type="text" class="form-control" value="{{ $user->email }}" required
                               name="email" id="email">
                    </div>
                    <button type="submit" class="button-info">enregistrer</button>
                </form>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6"><h4><b>mot de passe</b></h4></div>
                    <div class="col-md-3 col-md-offset-3"><a href="" class="modif-password"><i class="fa fa-edit"></i>
                            Modifier</a></div>
                </div>
                <form action="{{ route('modif_password') }}"  method="post" class="form-box">
                    @csrf
                    <div class="form-group">
                        <label>Votre mot de passe :</label>
                        <input disabled type="password" class="form-control" value="{{ $user->password }}" required
                               name="password" id="password">
                    </div>
                    <button type="submit" class="button-password">enregistrer</button>
                </form>
            </div>
        </div>

    </div>

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

@endsection
