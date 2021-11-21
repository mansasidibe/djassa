@extends('layout.header')

@section('container.produit.users')

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
                <li><a href="{{ route('product.index') }}" class="selected">Produits</a></li>
                <li><a href="{{ route('user.a_propos') }}">A propos</a></li>
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
            @if (Session('message'))
            <p style="color:green;">{{ session('message') }}</p>
        @endif
                @if (Session('message'))
                <p style="color:green;">{{ session('message') }}</p>
                 @endif
        	<h1> Produits</h1>
            @if ($products->count())
                @foreach ($products as $product)
                <div class="product_box">
                    <h3>{{ $product->product_name }}</h3>
                    <a href="#"><img src="/storage/{{ $product->product_photo }}" alt="Shoes 1" /></a>
                    <p>{{ $product->product_description }}</p>
                  <p class="product_price">{{ $product->product_price }} FCFA</p>
                  @auth
                  <form method="POST" action="{{ route('user.ajoutPanier', $product->id) }}">
                    @csrf
                    <button style="border: none;" class="addtocart"></button>
                    {{-- <a href="{{ route('user.ajoutPanier', $product->id) }}" class="addtocart"></a> --}}
                </form>
                  @endauth
                  @guest
                  <a href="{{ route('user.login') }}" class="addtocart"></a>
                  @endguest

                    <a href="{{ route('product.show', $product->id) }}" class="detail"></a>
                </div>
                @endforeach
            @else
                <p>Pas de produit</p>
            @endif

            <div class="cleaner"></div>

        </div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@include('layout.footer')

</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

@endsection
