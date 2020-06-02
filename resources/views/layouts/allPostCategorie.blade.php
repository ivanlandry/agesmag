@extends('layouts.app')

@section('content')

    @include('layouts.partials.header')

    @include('layouts.partials.search_bar')

    @include('layouts.partials.banner',['title'=>'toutes les annonces','route'=>$route])

    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
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
                @if(count($posts)>0)
                    <div class="col-md-9">
                        <div>
                            <span>trier par </span> <a href="">prix</a> | <a href="">date</a>
                        </div>
                        <br><br>
                        @foreach($posts as $post)
                            <div class="single-product-widget col-md-6">
                                <div class="single-wid-product">
                                    <a href="{{ route('showPost',$post) }}"><img
                                            src="{{ asset('storage/'.$post->img_1) }}" alt=""
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
                @else
                    <div class="col-md-offset-2">
                        <h2><span class="fa fa-exclamation-triangle" style="padding-right: 20px;"></span> aucune annonce
                            de cette categorie</h2>
                    </div>
                @endif
            </div>
            <div class="d-flex justify-content-end">
                {{ $posts->links() }}
            </div>


        </div>

    </div>
    </div>

    @include('layouts.partials.footer')
@endsection

