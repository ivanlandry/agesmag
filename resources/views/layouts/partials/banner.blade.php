<div class="container" style="padding-right: 50px;">
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="breadcrumb-link">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
    </div>
    @if($route ?? '')
        <hr>
    @endif
</div>
