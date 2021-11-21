@extends('layout.header')

@section('container.register.users')

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
        	<h1>Ouvrir un compte client</h1>
            <div class="content_half float_l">
                @if (Session('message'))
                    <p style="color:green;">{{ session('message') }}</p>
                @endif
                <div id="contact_form">
                   <form method="post" name="contact" action="{{ route('user.doRegister') }}">
                    @csrf
                        <label for="email">Nom & Prénom:</label> <input type="text" id="email" name="name" class="validate-email required input_field" />
                        <div class="cleaner h10"></div>

                        <label for="email">Numéro:</label> <input type="text" id="email" name="number" class="validate-email required input_field" />
                        <div class="cleaner h10"></div>

                        <label for="email">Email:</label> <input type="email" id="email" name="email" class="validate-email required input_field" />
                        <div class="cleaner h10"></div>

                        <label for="phone">Mot de passe:</label> <input type="password" name="password" id="phone" class="input_field" />
                        <div class="cleaner h10"></div>

                        <label for="phone">Confirmer:</label> <input type="password" name="password_confirmation" id="phone" class="input_field" />
                        <div class="cleaner h10"></div>

                        <input type="submit" class="submit_btn" name="submit" id="submit" value="S'inscrire" /><br>
                        <p>J'ai déjà un compte <a href="{{ route('user.login') }}">cliquez ici</a><br/></p>
                    </form>
                </div>
            </div>
            <div class="content_half float_r">
                <h5>Adresse</h5>
                Abidjan, Côte d'Ivoire <br />

                Phone: 00 00 00 00 00<br />
                Email: <a>test@djassa.com</a><br/>

                <div class="cleaner h40"></div>
            </div>

        </div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@include('layout.footer')

</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

@endsection
