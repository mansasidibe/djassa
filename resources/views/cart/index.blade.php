@extends('layout.header')

@section('container.panier.users')

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
        	<h1>Mon Panier de commande</h1>
            @if ($panier->count())
            <table width="680px" cellspacing="0" cellpadding="5">
                <tr bgcolor="#ddd">
                   <th width="220" align="left">Image </th>
                   <th width="180" align="left">Description </th>
                    <th width="100" align="center">Pointure </th>
                   <th width="60" align="right">Prix </th>
                   <th width="60" align="right">Catégorie </th>
                   <th width="90"> Action </th>

             </tr>
             @foreach ($panier as $commande)
                <tr>
                    <td><img src="storage/{{ $commande->product_photo }}" alt="image 1" /></td>
                    <td>{{ $commande->product_name }}</td>
                    <td align="center"><input type="text" value="1" style="width: 20px; text-align: right" /> </td>
                    <td align="right">{{ $commande->product_price }}</td>
                    <td align="right">{{ $commande->categorie }} </td>
                    <td align="center"> <a href="{{ route('user.supprimePanier', $commande->id) }}"><img src="images/remove_x.gif" alt="remove" /><br />Remove</a> </td>
                </tr>
             @endforeach
               <tr>
                   <td colspan="3" align="right"  height="30px"></td>
                   <td align="right" style="background:#ddd; font-weight:bold"> Total </td>
                   <td align="right" style="background:#ddd; font-weight:bold">$240 </td>
                   <td style="background:#ddd; font-weight:bold"> </td>
               </tr>
   </table>
            @else
                <p>Votre panier est vide</p>
            @endif
                    <div style="float:right; width: 215px; margin-top: 20px;">

					<p><a href="checkout.html">Valider les commandes</a></p>

                    </div>
			</div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

    @include('layout.footer')

</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

@endsection
