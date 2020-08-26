
<div class="footer-top-area">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="footer-about-us">
                    <h2>VITRI<span>MAG</span></h2>


                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Mon compte</h2>
                    <ul>
                        @guest
                        <li><a href="{{ route('login')  }}">se connecter</a></li>
                        <li><a href="{{ route('register')  }}">creer un compte</a></li>
                        @endguest
                        <li><a href="{{ route('post.create')  }}">publier une annonce</a></li>
                        <li><a href="#">favoris</a></li>

                    </ul>
                </div>
            </div>


            <div class="col-md-4 col-sm-4">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Newsletter</h2>
                    <p>S'inscrire a la newsletter pour etre informé des nouveautés</p>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" placeholder="votre adresse email">
                            <input type="submit" value="Souscrire">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
