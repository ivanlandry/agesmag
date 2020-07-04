@extends('layouts.mon_compte.mes_annonces')



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
                    <div class="col-md-3 col-md-offset-3"><a href="" style="text-decoration: none;" class="modif-info"><i class="fa fa-edit"></i>
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
                    <div class="col-md-3 col-md-offset-3"><a href="" style="text-decoration: none;" class="modif-password"><i class="fa fa-edit"></i>
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



@endsection

