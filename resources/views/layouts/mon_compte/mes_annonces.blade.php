@extends('layouts.app')

@section('content')

    @include('layouts.partials.header')

    <div class="container" style="padding-right: 50px; padding-top: 0;">
        <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="breadcrumb-link">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('annonce') }}">Mon
                            compte</a></li>
                </ol>
            </nav>
            <hr>
            <div style="height: 60px;background:#0A6EAD ;color: #ffffff; font: 14px  Arial, Helvetica, sans-serif;">
                <div class="row">
                    <div class="col-md-2">
                        <div>
                            <span class="fa fa-user-circle"
                                  style="font-size: 22px; padding-left: 10px; padding-right: 10px;"></span>
                            <span>Bonjour  {{ $user->name }} ,</span>
                            <a href="#" style="color: white;padding-left: 40px;"> Se deconnecter</a>
                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </div>
            <br><br>
            <div>
                <nav>
                    <ul>
                        <li>mes annonce</li>
                        <li>parametres</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>



    <br><br>
    @include('layouts.partials.footer')

@endsection
