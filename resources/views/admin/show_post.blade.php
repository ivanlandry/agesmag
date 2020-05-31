@extends('layouts.base_admin')

@section('content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">

                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('post.index') }}">produits</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30">
            <div class="product-slider" style="height: 500px;">
                <div id="productslider-1" class="product-carousel carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block" src="{{ asset('storage/'.$post->img_1) }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="{{ asset('storage/'.$post->img_2) }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="{{ asset('storage/'.$post->img_3) }}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30"
             style="height: 500px;">
            <div class="product-details" style="height: 500px;">
                <div class="border-bottom pb-3 mb-3">
                    <h2 class="mb-3">{{ $post->title }}</h2>
                    <div class="product-rating d-inline-block float-right">

                    </div>
                    <h3 class="mb-0 text-primary">  {{ $post->prix }} fcfa</h3>
                </div>
                <div class="product-size border-bottom">
                    <h4>vendeur</h4>
                    <div>
                        <span>{{ $post->user->name }}</span>
                    </div>
                    <div class="product-qty">
                        <h4>lieu</h4>
                        <div class="quantity">
                            <span>{{ $post->ville->title }}</span>
                        </div>
                    </div>
                </div>
                <div class="product-size border-bottom">
                    <h4>publié le </h4>
                    <div>
                        <span>{{ $post->created_at }}</span>
                    </div>
                    <div class="product-qty">
                        <h4>categorie</h4>
                        <div class="quantity">
                            <span>{{ $post->categorie->title }}</span>
                        </div>
                    </div>
                </div>
                <div class="product-description">
                    <h4 class="mb-1">Description</h4>
                    <p>{{ $post->description }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
