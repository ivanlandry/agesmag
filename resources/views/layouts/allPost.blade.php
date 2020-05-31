@extends('layouts.app')

@section('content')

    @include('layouts.partials.header')

    <div class="container" style=" padding-top: 0;padding-right: 60px;">
        <form action="" class=" row  text-black">
            @csrf
            <div class="col-md-3">
                <input type="text" placeholder="Que cherchez vous?" class="form-control">
            </div>
            <div class="col-md-3" style="padding-top: 6px;">
                <select name="categorie_search" id="categorie_search" class="form-control">
                    <option value="Toutes categories">Toutes categories</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3" style="padding-top: 6px;">
                <select name="ville_search" id="ville_search" class="form-control">
                    <option value="Choisir une ville">Choisir une ville</option>
                    @foreach($villes as $ville)
                        <option value="{{ $ville->id }}">{{ $ville->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3" style="padding-top: 6px;">
                <button class=" fa fa-search" type="submit" class="bg-light"
                        style=" text-transform:capitalize; color: #0A6EAD; height:35px; background: #dddddd; border-radius: 2px; ">
                    rechercher
                </button>
            </div>
        </form>
    </div>

    <div class="container" style="padding-right: 50px;">
        <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="breadcrumb-link">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('annonce') }}">Toutes les
                            annonces</a></li>
                </ol>
            </nav>
            <hr>
        </div>

    </div>

    <div class="product-widget-area">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">categories</div>
                        <ul class="list-group list-group-flush">
                            @foreach($categories as $categorie)
                                <li class="list-group-item"><a href="{{ route('annonce_categorie',$categorie->id) }}"
                                                               style="text-decoration: none;">{{ $categorie->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-md-9">
                    <div>
                        <span>trier par </span> <a href="">prix</a> | <a href="">date</a>
                    </div>
                    <br><br>
                    @foreach($posts as $post)
                        <div class="single-product-widget col-md-6">
                            <div class="single-wid-product">
                                <a href="{{ route('showPost',$post) }}"><img src="{{ asset('storage/'.$post->img_1) }}"
                                                                             alt=""
                                                                             class="product-thumb"></a>
                                <h2><a href="{{ route('showPost',$post) }}">{{ $post->title }}</a></h2>
                                <div class="product-wid-rating">
                                    {{ $post->ville->title }}
                                </div>
                                <div class="product-wid-price">
                                    <ins>{{ $post->prix  }}fcfa</ins>
                                    <span>{{ $post->created_at }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
            <div class="d-flex justify-content-end">
                {{ $posts->links() }}
            </div>

        </div>

    </div>
    </div>

    @include('layouts.partials.footer')

    <script language="javascript">

        $(function () {

            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $('#categorie_search,#ville_search').change(function () {

                if ($(this).attr('id') == 'categorie_search') {

                    $.ajax({
                        method: 'POST',
                        url: '{{ route("search") }}',
                        data: {
                            type: 'categorie',
                            val: $(this).val()
                        },
                        dataType: 'json'
                    }).done((data) => {
                        console.log(data)
                    }).fail((error) => {
                        console.log(error)
                    });
                } else {
                    $.ajax({
                        method: 'POST',
                        url: '{{ route("search") }}',
                        data: {
                            type: 'ville',
                            val: $(this).val()
                        },
                        dataType: 'json'
                    }).done((data) => {
                        console.log(data)
                    }).fail((error) => {
                        console.log(error)
                    });
                }
            });
        });
    </script>
@endsection

