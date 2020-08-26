@extends('layouts.app')

@section('extra-css')

    <style>
        .ruban {
            left: -10px;
            top: 11px;
            z-index: 999;
            position: absolute;
            width: 11px;
            height: 43px;
            background-color: #2887E5;
            color: #fff;
        }

        .ruban_id {
            min-width: 300px;
            padding: 10px 25px 10px 28px;
            left: -40px;
            top: -16px;
            position: relative;
            margin-bottom: -20px;
            width: max-content;
            height: 43px;
            color: #fff;
            background: #2887E5;
        }

        h3, span {
            font-weight: bold;
        }
    </style>

@endsection

@section('content')
    @include('layouts.partials.header')



    <div>
        @include('layouts.partials.banner',['title'=>'nouvelle annonce'])

        @if(session()->has('message'))

            <div class="container">
                <div class="alert alert-success text-center col-md-10 col-md-offset-1">
                    <span>{{ session()->get('message') }}</span>
                </div>
            </div>
        @endif


        <div class="container">
            <div class="row">
                <br>

                <div class="col-md-10 col-md-offset-1"
                     style="box-shadow: 0 1px 4px rgba(0,0,0,0.3); background-color: #fff; padding: 30px;">

                    <div style="">
                        <div style="padding-right: 100px;">
                            <div class="ruban">
                            </div>
                            <div>
                                <h3 class="ruban_id"> publier votre annonce gratuitemnt en 2minutes !</h3>
                            </div>
                            <br><br>
                            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h4>Lieu et categorie</h4>

                                <div>
                                    <label for="">choississez une ville *</label>

                                    <input id="autocomplete" name="ville"
                                           placeholder="Enter your address"
                                           onFocus="geolocate()"
                                           type="text" class="form-control"/>


                                </div>
                                <br>
                                <div>
                                    <label for="">choississez une categorie *</label>
                                    <select name="categorie" id="" class="form-control">
                                        <option value="choisi">choisir la categorie</option>

                                        @foreach($categories as $categorie)
                                            <option value="{{ $categorie->title }}">{{ $categorie->title }}</option>
                                        @endforeach
                                        <option disabled="disabled">------------------</option>
                                    </select>
                                </div>
                                <br>
                                <hr>

                                <h4>details du produit</h4>
                                <br>

                                <div>
                                    <label for="">Titre *</label>
                                    <input type="text" id="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           placeholder="Titre de votre produit (sans prix)" required="" autofocus=""
                                           name="title">
                                    @error('titre')
                                    <div class="invalid-feedback">{{$errors->first('title')}}</div>
                                    @enderror
                                </div>
                                <br>
                                <div>
                                    <label for="">Description *</label>
                                    <input type="text" id="inputName"
                                           class="form-control @error('description') is-invalid @enderror"
                                           placeholder="Donnez plus de details possible sur votre produit" required=""
                                           autofocus=""
                                           name="description" style="height: 100px;">
                                    @error('description')
                                    <div class="invalid-feedback">{{$errors->first('description')}}</div>
                                    @enderror

                                </div>
                                <br>
                                <div>
                                    <label for="">Prix *</label>
                                    <input type="number" id="inputName"
                                           class="form-control @error('prix') is-invalid @enderror"
                                           placeholder="Prix de votre produit en FCFA"
                                           required="" autofocus="" name="prix">
                                    @error('prix')
                                    <div class="invalid-feedback">{{$errors->first('prix')}}</div>
                                    @enderror
                                </div>
                                <br>
                                <label for="Photos">Photos *</label><br>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('img_1') is-invalid @enderror"
                                           id="customFile" name="img_1">
                                    <label class="custom-file-label" for="customFile">Choisir une premiere image</label>
                                    @error('img1')
                                    <div class="invalid-feedback">{{$errors->first('img_1')}}</div>
                                    @enderror
                                </div>
                                <br><br>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('img_2') is-invalid @enderror"
                                           id="customFile" name="img_2">
                                    <label class="custom-file-label" for="customFile">Choisir une deuxieme image</label>
                                    @error('img_2')
                                    <div class="invalid-feedback">{{$errors->first('img_2')}}</div>
                                    @enderror
                                </div>
                                <br><br>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('img_3') is-invalid @enderror"
                                           id="customFile" name="img_3">
                                    <label class="custom-file-label" for="customFile">Choisir une troisieme
                                        image</label>
                                    @error('img_3')
                                    <div class="invalid-feedback">{{$errors->first('img_3')}}</div>
                                    @enderror
                                </div>
                                <br>
                                @guest
                                    <hr>
                                    <br>
                                    <h4>vos informations</h4>
                                    <br>
                                    <div>
                                        <label for="">Nom *</label>
                                        <input type="text" id="inputName" class="form-control"
                                               placeholder="Nom"
                                               required="" autofocus="" name="nom">
                                    </div>
                                    <br>
                                    <div>
                                        <label for="">Email *</label>
                                        <input type="email" id="inputEmail" class="form-control"
                                               placeholder="Adresse email"
                                               required="" autofocus="" name="email">
                                    </div>
                                    <br>
                                    <div>
                                        <label for="">Telephone *</label>
                                        <input type="text" id="inputTel" class="form-control"
                                               placeholder="Telephone"
                                               required="" autofocus="" name="tel">
                                    </div>
                                    <br>
                                    <div>
                                        <label for="">Mot de passe *</label>
                                        <input type="password" id="inputPassword" class="form-control"
                                               placeholder="Mot de passe"
                                               required="" autofocus="" name="password">
                                    </div>
                                    <br>
                                    <br>
                                @endguest
                                <br><br>
                                <button type="submit" class="btn btn-primary col-md-8 col-md-offset-2"
                                        style="height: 45px; ">
                                    publier Votre annonce
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    @include('layouts.partials.footer')

@endsection

@section('extra-script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKfKWQQf9yv02PAZZHSOyHvXzHQ5jLOKI&libraries=places&callback=initAutocomplete"
            async defer></script>
    <script>
        var placeSearch, autocomplete;


        function initAutocomplete() {
            // Create the autocomplete object, restricting the search predictions to
            // geographical location types.
            autocomplete = new google.maps.places.Autocomplete(
                document.getElementById('autocomplete'), {types: ['geocode']});

            // Avoid paying for data that you don't need by restricting the set of
            // place fields that are returned to just the address components.
            autocomplete.setFields(['address_component']);

            // When the user selects an address from the drop-down, populate the
            // address fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);


        }

        function fillInAddress() {

            var place = autocomplete.getPlace();


        }


        function de() {

            console.log(document.getElementById('autocomplete').value);
        }

        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    d = geolocation;

                    var circle = new google.maps.Circle(
                        {center: geolocation, radius: position.coords.accuracy});
                    autocomplete.setBounds(circle.getBounds());

                });
            }

        }
    </script>

@endsection
