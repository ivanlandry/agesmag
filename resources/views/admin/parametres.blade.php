@extends('layouts.base_admin')

@section('content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">

                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('post.index') }}">Prametres</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card-body border-top">
                <div class="form-group">
                    <label class="col-form-label">Nombre d'annonce par page </label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control">
                        <div class="input-group-append border-left-1">
                            <button type="button" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>

                </div>
            </div>

          <!--  <div class="card-body border-top">
                <div class="form-group">
                    <label class="col-form-label">Button Addons</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary">Go!</button>
                        </div>
                    </div>
                </div>
            </div>
            -->
        </div>
    </div>
    </div>
@endsection
