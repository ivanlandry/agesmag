@extends('layouts.base_admin')

@section('content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">

                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">produits</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Liste des post</h5>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-light">
                        <tr class="border-0">
                            <th class="border-0">Image</th>
                            <th class="border-0">Titre du produit</th>
                            <th class="border-0">Prix</th>
                            <th class="border-0">description</th>
                            <th class="border-0">Date de publication</th>
                            <th class="border-0">Statut</th>
                            <th class="border-0">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <div class="m-r-10"><img src="{{ asset('storage/'.$post->img_1) }}" alt="user"
                                                             class="rounded" width="45"></div>
                                </td>
                                <td>{{ $post->title }} </td>
                                <td>{{ $post->prix }} </td>
                                <td>{{ substr( $post->description , 0 , 20)."..."  }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->etat }}</td>
                                <td>
                                    <button class="btn btn-danger"><a href="{{ route('post.destroy',$post) }}"
                                                                      style="color:white; text-decoration: none;"
                                                                      class="fa fa-trash"></a></button>
                                    <button class="btn btn-success"><a href="{{ route('post.show',$post) }}"
                                                                       style="color:white; text-decoration: none;"
                                                                       class="fa fa-eye"></a></button>
                                    @if($post->etat==0)
                                        <a href="{{ route('valider',[$post,$post->user]) }}"
                                           style="color:white; text-decoration: none;"
                                           class="btn btn-primary">valider</a>
                                        <a href="{{ route('rejeter',[$post,$post->user]) }}"
                                           style="color:white; text-decoration: none;"
                                           class="btn btn-primary">rejeter</a>
                                    @else
                                        <a href=""
                                           style="color:white; text-decoration: none;" class="btn btn-primary">desactiver</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="d-flex justify-content-end">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
