@extends('layout.header')

@section('container.admin.commande.index')

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="templatemo_header">
    	<div id="site_title"><h1><a href="#">Online Shoes Store</a></h1></div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_header -->

    <div id="templatemo_menubar">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="{{ route('admin.index') }}">Accueil</a></li>
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
    	@include('layout.siderbar_admin')
        <div id="content" class="float_r">
        	<h1>Toutes les commandes </h1>
            <div class="content_half float_l">

                <table width="680px" cellspacing="0" cellpadding="5">
                    <tr bgcolor="#ddd">
                       <th width="90" align="center">Image </th>
                       <th width="50" align="center">Nom </th>
                        <th width="30" align="center">Prix </th>
                       <th width="100" align="center">Nom client </th>
                       <th width="40" align="center">Numero </th>
                       <th width="40" align="center">Adresse </th>
                       <th width="40" align="center">Date </th>
                       <th width="90"> Action </th>

                 </tr>
                    @if ($order->count())
                        @foreach ($order as $produit)
                        <tr>
                            <td><img src="/storage/{{  $produit->product_photo }}" width="50" height="60" alt="image 2" /> </td>
                            <td >{{  $produit->product_name }}</td>
                            <td align="center">{{  $produit->product_price }}  </td>
                            <td align="center">{{  $produit->client_name }}  </td>
                            <td align="center">{{  $produit->client_numero }} </td>
                            <td align="center">{{  $produit->client_adresse }} </td>
                            <td align="center">{{  $produit->created_at->diffForHumans() }} </td>
                            <td align="center"> <a href="{{ route('order.destroy',$produit->id ) }}"><br />Supprimer</a> </td>
                        </tr>

                        @endforeach
                    @else
                        <p>Pas de commande</p>
                    @endif
                 </table>

            </div>

        </div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@include('layout.footer')

</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

@endsection
