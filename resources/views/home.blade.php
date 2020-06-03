@extends('layouts.app')


@section('content')
    @include('layouts.partials.header')

    @if(session()->has('message'))
        <div class="container">
            <div class="alert alert-success text-center">
                <span >{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif


    @include('layouts.partials.search_bar')

    <div class="container">
        <div class="row">

        </div>
    </div>

    <br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 box">

                <div  style="padding: 10px 14px 15px 14px;">
                    <div class="float-left">
                        <b>Annonces recentes</b>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('annonce') }}" style="font: 14px 'Helvetica Neue' Roboto Helvetica; color: #0A6EAD; text-decoration: none;">Toutes les annonces</a>
                    </div>
                </div>
                <br>
                @foreach($post_recents as $p)

                    <div class="col-md-3">

                        <a href="{{ route('showPost',$p) }}">
                            <img style="height: 150px; width: 100%;"
                                 src="{{ asset('storage/'.$p->img_1) }}">
                        </a>
                        <br>

                        <b><a href="{{ route('showPost',$p) }}" style="text-decoration: none;">{{ $p->title }}</a></b><br>
                        <b>{{ $p->prix }} FCFA</b>
                    </div>

                    <div class="col-md-3">

                        <a href="{{ route('showPost',$p) }}">
                            <img style="height: 150px; width: 100%;"
                                 src="{{ asset('storage/'.$p->img_1) }}">
                        </a>
                        <br>

                        <b><a href="{{ route('showPost',$p) }}" style="text-decoration: none;">{{ $p->title }}</a></b><br>
                        <b>{{ $p->prix }} FCFA</b>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    </div>

    @include('layouts.partials.footer')
@endsection
