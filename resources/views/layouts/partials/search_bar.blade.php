<div class="container" style=" padding-top: 0;padding-right: 60px;">
    <form action="" class=" row  text-black">
        @csrf
        <div class="col-md-3">
            <input type="text" placeholder="Que cherchez vous?" class="form-control">
        </div>
        <div class="col-md-3" style="padding-top: 6px;">
            <select name="categorie_search" id="categorie_search" class="form-control">
                <option value="Toutes categories">Toutes categories</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3" style="padding-top: 6px;">
            <select name="ville_search" id="ville_search" class="form-control">
                <option value="Choisir une ville">Choisir une ville</option>
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3" style="padding-top: 6px;">
            <button class=" fa fa-search" type="submit" class="bg-light"
                    style=" text-transform:capitalize; color: #0A6EAD; height:35px; background: #dddddd; border-radius: 2px; ">
                rechercher
            </button>
        </div>
    </form>
</div>


<script language="javascript">

    $(function () {

        function load_post(data) {


        }

        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $('#categorie_search,#ville_search').change(function () {

            if ($(this).attr('id') == 'categorie_search') {

                $.ajax({
                    method: 'POST',
                    url: '{{ route("search") }}',
                    data: {
                        type: 'categorie',
                        val: $(this).val()
                    },
                    dataType: 'json'
                }).done((data) => {
                    alert(data)
                }).fail((error) => {
                    console.log(error)
                });
            } else {
                $.ajax({
                    method: 'POST',
                    url: '{{ route("search") }}',
                    data: {
                        type: 'ville',
                        val: $(this).val()
                    },
                    dataType: 'json'
                }).done((data) => {
                    alert(data)
                }).fail((error) => {
                    console.log(error)
                });
            }
        });
    });
</script>
