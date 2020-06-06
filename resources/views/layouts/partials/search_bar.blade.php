<div class="card">
    <div class="card-header">
        rechercher une annonce
    </div>
    <div class="card-header">
        <form action="{{ route('search') }}" method="get">
            @csrf
            <div class="form-group">
                <select class="form-control" name="categorie">
                    <option value="">choisir une categorie</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="que recherher vous ?" required>
            </div>
            <button type="submit">rechercher</button>
        </form>
    </div>
</div>
