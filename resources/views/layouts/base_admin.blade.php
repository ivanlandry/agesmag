<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <title>Admin</title>
</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">

                    <a class="dropdown-item" href="{{ route('logout')  }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                            class="fas fa-power-off mr-2"></i>
                        <form id="logout-form" method="POST" action="{{ route('logout')  }}" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </ul>
            </div>
        </nav>
    </div>

    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categorie.index') }}">Categories d'annonces</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.index') }}">Toutes les Annonces</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('desactive') }}">Annonces desactivées</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">Utilisateurs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('parametres') }}">Parametres</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
<!-- bootstap bundle js -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<!-- slimscroll js -->
<script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
<!-- main js -->
<script src="{{ asset('assets/libs/js/main-js.js') }}"></script>
<!-- chart chartist js -->
<script src="{{ asset('assets/vendor/charts/chartist-bundle/chartist.min.js')  }}"></script>
<!-- sparkline js -->
<script src="{{ asset('assets/vendor/charts/sparkline/jquery.sparkline.js')  }}"></script>
<!-- morris js -->
<script src="{{ asset('assets/vendor/charts/morris-bundle/raphael.min.js')  }}"></script>
<script src="{{ asset('assets/vendor/charts/morris-bundle/morris.js')  }}"></script>
<!-- chart c3 js -->
<script src="{{ asset('assets/vendor/charts/c3charts/c3.min.js')  }}"></script>
<script src="{{  asset('assets/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
<script src="{{ asset('assets/vendor/charts/c3charts/C3chartjs.js')  }}"></script>
<script src="{{ asset('assets/libs/js/dashboard-ecommerce.js')  }}"></script>
</body>

</html>
