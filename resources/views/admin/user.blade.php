@extends('layouts.base_admin')

@section('content')


    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">

                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">utilisateurs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Liste des utilisateurs</h5>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>date d'inscription</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->tel }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td><span class="bg-success">activer</span></td>
                                <td>
                                    <button class="btn btn-danger"><a href="/admin/deleteuser/<%=user.id%>"
                                                                      style="color:white; text-decoration: none;">supprimer</a>
                                    </button>
                                    <button class="btn btn-primary">desactiver</button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="d-flex justify-content-end">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
