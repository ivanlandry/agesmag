
<div class="footer-top-area">

    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>u<span>Stora</span></h2>
                    <p>L doloribus ver ritatis magni at?</p>

                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Mon compte</h2>
                    <ul>
                        @guest
                        <li><a href="{{ route('login')  }}">se connecter</a></li>
                        <li><a href="{{ route('register')  }}">creer un compte</a></li>
                        @endguest
                        <li><a href="{{ route('post.create')  }}">publier une annonce</a></li>
                        <li><a href="#">favoris</a></li>
                        <li><a href="{{ route('contact.create')  }}">contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Categories</h2>
                    <ul>
                        <li><a href="#">Mobile Phone</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
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
