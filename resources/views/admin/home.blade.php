@extends('layouts.base_admin')

@section('content')

    <div class="row">

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Annonces en ligne</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ count($post_en_ligne) }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Annonces en attente</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1"> {{ count($post_en_attente)  }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Annonces desactivees</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">1245</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Utilisateur</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ count($users) }}</h1>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Categories</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ count($categorie) }}</h1>
                    </div>
                </div>
            </div>
        </div>

    </div>


   <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
           <div class="card">
               <h5 class="card-header">Mes annonces</h5>
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
                                   <td>{{ substr( $post->description , 0 , 10)."..."  }}</td>
                                   <td>{{ $post->created_at }}</td>
                                   <td>
                                       @if($post->etat==1)
                                           <span class="badge-dot badge-success mr-1"></span>en ligne
                                       @else
                                           <span class="badge-dot badge-brand mr-1"></span>en attente
                                       @endif
                                   </td>
                                   <td>
                                       <button class="btn btn-success"><a href="{{ route('post.show',$post) }}"
                                                                          style="color:white; text-decoration: none;"
                                                                          class="fa fa-eye"></a></button>
                                       <form action="{{ route('post.destroy',$post) }}" method="post">
                                           @csrf
                                           @method('DELETE')
                                           <button class="btn btn-danger fa fa-trash" type="submit"></button>

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
                                       </form>


                                   </td>
                               </tr>
                           @endforeach
                           </tbody>
                       </table>
                   </div>
                   <br>

               </div>
           </div>
       </div>
   </div>


@endsection
