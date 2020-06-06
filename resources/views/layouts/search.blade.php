@extends('layouts.app')

@section('content')


    @include('layouts.partials.header')


    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.partials.search_bar')
            </div>

            @if(count($posts)==0)
                <div class="alert alert-secondary col-md-6 col-md-offset-1 text-center" role="alert"
                     style="height: 50px; margin: 20px 20px 20px 20px;  ">
                    Nous n'avons trouvé aucun resultat pour "{{ $search }}"
                </div>
            @endif

            <div class="col-md-9  box">
                <br>
                @foreach($posts as $p)

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

    @include('layouts.partials.footer')
@endsection
