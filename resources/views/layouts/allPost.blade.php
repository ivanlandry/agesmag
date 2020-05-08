@extends('layouts.app')

@section('content')

    @include('layouts.partials.header')

    <div class="container" style="padding-left: 30px; padding-right: 70px; padding-top: 0; ">
        <form action="" class="form-horizontal row bg-primary text-black" style="padding-top: 1px; height: 48px;"
              id="form_search">
            <div class="col-md-3">
                <input type="text" placeholder="Que cherchez vous?" class="form-control">
            </div>
            <div class="col-md-3" style="padding-top: 5px;">
                <select name="categorie" id="" class="form-control">
                    <option value="Toutes categories">Toutes categories</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->title }}">{{ $categorie->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3" style="padding-top: 5px;">
                <select name="ville" id="" class="form-control">
                    <option value="Choisir une ville">Choisir une ville</option>
                    @foreach($villes as $ville)
                        <option value="{{ $ville->title }}">{{ $ville->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3" style="padding-top: 5px;">
                <button type="submit" class="bg-light" style=" color: blue; height:35px;">rechercher
                </button>
            </div>
        </form>
    </div>

    <div class="container" style="padding-right: 50px;">
        <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="breadcrumb-link">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Toutes les annonces</li>
                </ol>
            </nav>
            <hr>
        </div>

    </div>

    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">categories</div>
                        <ul class="list-group list-group-flush">
                            @foreach($categories as $categorie)
                                <li class="list-group-item"><a href="" style="text-decoration: none;">{{ $categorie->title }}</a></li>
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
                                <a href="{{ route('showPost',$post) }}"><img src="{{ asset('storage/'.$post->img_1) }}" alt=""
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
@endsection

