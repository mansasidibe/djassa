@extends('layout.header')

@section('container.produit.show')

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="templatemo_header">
    	<div id="site_title"><h1><a href="#">Online Shoes Store</a></h1></div>
        @include('layout.header_right')
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_header -->

    <div id="templatemo_menubar">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="{{ route('user.index') }}">Accueil</a></li>
                <li><a href="{{ route('product.index') }}">Produits</a></li>
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
        	<h1>Details Produit</h1>
            <div class="content_half float_l">
        	<a  rel="lightbox[portfolio]" ><img src="/storage/{{$id->product_photo}}" alt="image" /></a>
            </div>
            <div class="content_half float_r">
                <table>
                    <tr>
                        <td width="160">Prix:</td>
                        <td>{{$id->product_price}} FCFA</td>
                    </tr>
                    <tr>
                        <td>Disponibilité:</td>
                        <td style="color: green">{{$id->product_disponibilite}}</td>
                    </tr>
                    <tr>
                        <td>Model:</td>
                        <td>{{$id->product_name}}</td>
                    </tr>
                    <tr>
                        <td>Votre pointure</td>
                        <td><input type="text"  style="width: 20px; text-align: right" /></td>
                    </tr>
                    <tr>
                    	<td>Quantité</td>
                        <td><input type="text" value="1" style="width: 20px; text-align: right" /></td>
                    </tr>
                </table>
                <div class="cleaner h20"></div>

                @auth
                <form method="POST" action="{{ route('user.ajoutPanier', $id->id) }}">
                    @csrf
                    <button style="border: none;" class="addtocart"></button>
                    {{-- <a href="{{ route('user.ajoutPanier', $product->id) }}" class="addtocart"></a> --}}
                </form>
                @endauth
                @guest
                <a href="{{ route('user.login') }}" class="addtocart"></a>
                @endguest


			</div>
            <div class="cleaner h30"></div>

            <h5>Description du produit</h5>
            <p>{{$id->product_description}}</p>

          <div class="cleaner h50"></div>

            <h3>Produits semblables</h3>
        	<div class="product_box">
            	<a href="productdetail.html"><img src="/storage/{{$id->product_photo}}" alt="" /></a>
                <h3>{{$id->product_name}}</h3>
                <p class="product_price">{{$id->product_price}} FCFA</p>
                <a href="#" class="addtocart"></a>
                <a href="#" class="detail"></a>
            </div>

        </div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

 @include('layout.footer')

</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

@endsection
