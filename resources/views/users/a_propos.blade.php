@extends('layout.header')
@section('container.propos.users')

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
                <li><a href="{{ route('user.a_propos') }}" class="selected">A propos</a></li>
                <li><a href="{{ route('user.faq') }}">FAQs</a></li>
                <li><a href="{{ route('user.contact') }}">Contact</a></li>
                @auth
                <li><a>{{ auth()->user()->name }}</a>
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
        <div id="content" class="float_r">
        	<h1>A Propos</h1>
        	<h2>La Société</h2>
        <p>Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow">CSS</a>. Donec sapien. Nam ac nunc. Aliquam fermentum cursus risus. Aliquam erat volutpat. Morbi a augue eget orci sodales blandit. Morbi et mi in mi eleifend adipiscing. Nullam id quam a ligula semper feugiat. Sed ultricies. Nulla et pede eu pede ultrices commodo. Nulla semper accumsan pede. Donec ut quam. Quisque egestas felis in diam.</p>
        <ul class="tmo_list">
        	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
            <li>Pellentesque quis nulla id orci malesuada porta posuere quis massa.</li>
            <li>Nunc vitae purus non augue scelerisque ultricies vitae et velit quis.</li>
            <li>Aliquam fermentum cursus risus aliquam erat volutpat.</li>
            <li>Morbi a augue eget orci sodales blandit morbiet mi in mi eleifend adipiscing.</li>
		</ul>
        <div class="cleaner h20"></div>
        <h3>L'équipe de gestion</h3>
		<p>Nam nec leo. Curabitur quis eros a arcu feugiat egestas. Nunc sagittis, dui non porttitor tincidunt, mi tortor tincidunt sem, et aliquet mi tortor eu turpis. Ut nisi ligula, viverra ac, placerat sed, ultricies vitae, neque. Morbi feugiat neque non odio eleifend pulvinar.</p>
        <div class="cleaner"></div>
        <blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis nulla id orci malesuada porta posuere quis massa. Nunc vitae purus non augue scelerisque ultricies vitae et velit quis nulla id orci malesua.
        </blockquote>
        </div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

    @include('layout.footer')

</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

@endsection
