<div id="header_right">
    <p>
    <a href="{{ route('user.login') }}">Mon Compte</a></p>
    @auth
        <p>
            Panier d'achat: <strong>3 éléments</strong> ( <a href="{{ route('user.panier') }}">Voir le panier</a> )
        </p>
    @endauth

</div>
