<div class="container" style="margin-top: 20px;">
    <div class="row">

        <div class="col-md-4">
            <a href="/">
                <img src="{{ asset('images/hom.png') }}" alt="" style="height: 50px;">
            </a>
        </div>
        <div class="col-md-4">
            <div class="user-menu">
                <ul>
                    <li><a href="{{ route('annonce') }}"><i class="fa fa-search" style="color:#0A6EAD;"></i> Annnonces </a></li>

                    <li class="dropdown" >
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" @click.prevent><i
                                class="fa fa-user" style="color:#0A6EAD;"></i> Mon compte </a>
                        <ul class="dropdown-menu">

                            @guest
                                <li><a href="{{ route('login')  }}" class="dropdown-item"> se connecter </a></li>
                                <li><a href="{{ route('register')  }}" class="dropdown-item"> creer un compte </a></li>
                            @else
                                <li><a href="{{ route('mes-annonces') }}" class="dropdown-item"> mes annonces </a></li>
                                <li><a href="{{ route('mes-annonces') }}" class="dropdown-item"> parametres</a></li>
                                <hr>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        se deconnecter
                                    </a>
                                    <form id="logout-form" method="POST" action="{{ route('logout')  }}" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-1">
            <div class="header-right">
                <ul class="list-unstyled list-inline">
                    <li class="active">
                        <button style="height: 45px; width: 300px; background-color:orange; border-radius: 6px;">
                            <a href="{{ route('post.create')  }}" style=" color: white; text-decoration: none; font-size: 18px;">publier
                                Votre annonce</a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    @if(!isset($route))
        <div style="padding-right: 50px;">
            <hr>
        </div>
    @endif
</div>
