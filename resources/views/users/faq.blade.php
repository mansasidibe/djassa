@extends('layout.header')

@section('container.faq.users')

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="templatemo_header">
    	<div id="site_title"><h1><a href="#">Magasin de chaussure en ligne</a></h1></div>
        @include('layout.header_right')
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_header -->

    <div id="templatemo_menubar">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="{{ route('user.index') }}">Accueil</a></li>
                <li><a href="{{ route('product.index') }}">Produits</a></li>
                <li><a href="{{ route('user.a_propos') }}">A propos</a></li>
                <li><a href="{{ route('user.faq') }}" class="selected">FAQs</a></li>
                <li><a href="{{ route('user.contact') }}">Contact</a></li>
                @auth
                <li><a >{{ auth()->user()->name }}</a>
                    <ul>
                        <li><a href="{{ route('user.logout') }}">Déconnexion</a></li>
                  </ul>
                </li>
            @endauth
            </ul>
            <br style="clear: left" />
        </div> <!-- end of ddsmoothmenu -->
        <div id="templatemo_search">
            <form action="#" method="get">
              <input type="text" value=" " name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
              <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
            </form>
        </div>
    </div> <!-- END of templatemo_menubar -->

    <div id="templatemo_main">
    	@include('layout.siderbar')
        <div id="content" class="float_r faqs">
        	<h1>FAQs</h1>
            <h5>Comment savoir si ma commande a été prise en compte?</h5>
            <p>Après votre commande, nous vous enverrons un email de confirmation dans l'immédiatn et vous allerons dans moins de 24h pour confirmer votre commande. Si vous ne récevez ni email ni d'appel, alors connectez vous à votre compte et vérifier l'état de votre commande.</p>

            <h5>Quand est-ce que ma commande sera valide?</h5>
            <p>Votre commande est confirmée dès que vous récevez un appel le confirmant.</p>


            <h5>Puis-je annuler une commande après avoir réçu un appel de confirmation?</h5>
            <p>Veuillez lire notre polique d'annulation de commande s'il vous plait <a href="#">ici</a></p>

        </div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

    @include('layout.footer')

</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

@endsection
