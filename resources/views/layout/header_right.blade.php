<div id="header_right">
    <p>
    @guest
        <a href="{{ route('user.login') }}">Mon Compte</a></p>
    @endguest

    @auth
        <p>
            Panier d'achat: <strong>{{ $count }} éléments</strong> ( <a href="{{ route('user.panier') }}">Voir le panier</a> )
        </p>
    @endauth

</div>
