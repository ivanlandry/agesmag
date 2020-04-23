@extends('layouts.base_admin')

@section('content')


    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">

                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">categorie</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body border-top">
        <form action="{{ route('categorie.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="col-form-label" for="title">Ajouter une categorie</label>
                <div class="input-group mb-3">
                    <input required id="title" type="text" class="form-control @error('title') is-valid @enderror" name="title">
                    @error('title')
                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                    @enderror
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Liste de Categories</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titre</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $categorie)
                            <tr>
                                <td>{{ $categorie->id }}</td>
                                <td>{{ $categorie->title }}</td>
                                <td>
                                    <button class="btn btn-danger"><a href="#" style="color:white; text-decoration: none;">supprimer</a></button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="d-flex justify-content-end">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
