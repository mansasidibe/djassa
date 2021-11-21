@extends('layout.header')

@section('container.produit.create')

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
                <li><a href="{{ route('admin.index') }}">Accueil</a></li>
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
    	@include('layout.siderbar_admin')
        <div id="content" class="float_r">
        	<h1>Ajout de produit </h1>
            <div class="content_half float_l">
                <div id="contact_form">
                    <form method="post" name="contact" enctype="multipart/form-data" action="{{ route('product.store') }}">
                     @csrf
                         <label for="email">Nom Produit:</label> <input type="text" id="email" name="product_name" class="validate-email required input_field" />
                         <div class="cleaner h10"></div>

                         <label for="description">Description:</label> <textarea id="text" name="product_description" class="required"></textarea>
                         <div class="cleaner h10"></div>

                         <label for="email">Prix:</label> <input type="text" id="email" name="product_price" class="validate-email required input_field" />
                         <div class="cleaner h10"></div>

                         <label for="product_remise">Rémise:</label> <input type="text" value="0" id="email" name="product_remise" class="validate-email required input_field" />
                         <div class="cleaner h10"></div>

                         <label for="product_remise">Disponibilité:</label> <select name="product_disponibilite" class="validate-email required input_field">
                             <option value="disponible" selected>Disponible</option>
                             <option value="disponible">Non Disponible</option>
                         </select>
                         <div class="cleaner h10"></div>

                         <label for="categorie">Catégorie:</label> <select name="categorie" class="validate-email required input_field">
                             <option>Selectionner une categorie</option>
                             @if ($categories->count())
                                 @foreach ($categories as $category)
                                 <option value="{{ $category->libele }}">{{ $category->libele }}</option>
                                 @endforeach
                             @else
                                 <option>Pas de catégorie</option>
                             @endif
                         </select>
                         <div class="cleaner h10"></div>

                         <label for="product_photo">Photo:</label> <input type="file" name="product_photo" class="validate-email required input_field" />
                         <div class="cleaner h10"></div>

                         <label for="email">Nom Propriétaire:</label> <input type="text" id="email" name="proprietaire" class="validate-email required input_field" />
                         <div class="cleaner h10"></div>

                         <label for="email">Numéro Propriétaire:</label> <input type="text" id="email" name="num_proprietaire" class="validate-email required input_field" />
                         <div class="cleaner h10"></div>

                         <input type="submit" class="submit_btn" name="submit" id="submit" value="Ajouter" />

                     </form>
                </div>

            </div>

            <div class="content_half float_r">
                <h5>Dimension de la photo</h5>
                1200 X 1000 <br />
                <br />

            </div>

        </div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@include('layout.footer')

</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

@endsection
