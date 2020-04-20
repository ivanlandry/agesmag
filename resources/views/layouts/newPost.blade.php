@extends('layouts.app')

@section('content')
    @include('layouts.partials.header')

    <style>
        h3, span {
            font-weight: bold;
        }
    </style>

    <div>
        <div class="container">
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" class="breadcrumb-link">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">nouvelle annonce</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <br>

                <div class="col-md-8 col-md-offset-2">

                    <form action="/newPost" method="post">
                        <h3>Lieu et categorie</h3>

                        <div>
                            <label for="">choississez une ville *</label>
                            <select name="" id="" class="form-control">
                                <option value="choisi">choisir la ville</option>
                                <option value="choisi">ville 1</option>
                                <option value="choisi">ville 2</option>
                            </select>
                        </div>
                        <br>
                        <div>
                            <label for="">choississez une categorie *</label>
                            <select name="" id="" class="form-control">
                                <option value="choisi">choisir la categorie</option>
                                <option value="choisi">Produits agricoles</option>
                                <option value="choisi">Elevage</option>
                            </select>
                        </div>
                        <br>
                        <hr>

                        <h3>details du produit</h3>
                        <br>

                        <div>
                            <label for="">Titre *</label>
                            <input type="text" id="inputName" class="form-control"
                                   placeholder="Titre de votre produit (sans prix)" required="" autofocus=""
                                   name="name">
                        </div>
                        <br>
                        <div>
                            <label for="">Description *</label>
                            <input type="text" id="inputName" class="form-control"
                                   placeholder="Donnez plus de details possible sur votre produit" required=""
                                   autofocus=""
                                   name="name" style="height: 100px;">
                        </div>
                        <br>
                        <div>
                            <label for="">Prix *</label>
                            <input type="number" id="inputName" class="form-control"
                                   placeholder="Prix de votre produit en FCFA"
                                   required="" autofocus="" name="name">

                        </div>
                        <br>
                        <label for="Photos">Photos *</label><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="img1">
                            <label class="custom-file-label" for="customFile">Choisir une premiere image</label>
                        </div>
                        <br><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="img1">
                            <label class="custom-file-label" for="customFile">Choisir une deuxieme image</label>
                        </div>
                        <br><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="img1">
                            <label class="custom-file-label" for="customFile">Choisir une troisieme image</label>
                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary col-md-8 col-md-offset-2" style="height: 45px; ">
                            publier Votre annonce
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <br>
    @include('layouts.partials.footer')

@endsection
