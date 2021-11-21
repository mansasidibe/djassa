@extends('layout.header')

@section('container.contact.users')

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
                <li><a href="{{ route('user.contact') }}" class="selected">Contact</a></li>
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
        	<h1>Ecrivez nous </h1>
            <div class="content_half float_l">
                @if (Session('message'))
                    <p style="color:green;">{{ session('message') }}</p>
                @endif
                <div id="contact_form">
                   <form method="post" name="contact" action="{{ route('message.store') }}">
                    @csrf
                    @auth
                    <input type="hidden" value="{{ auth()->user()->name }}" id="author" name="nom_envoyeur" class="required input_field" />
                    <div class="cleaner h10"></div>
                    <input type="hidden" value="{{ auth()->user()->email }}" id="email" name="email_envoyeur" class="validate-email required input_field" />
                    <div class="cleaner h10"></div>

                    <input type="hidden" value="{{ auth()->user()->number }}" name="numero" id="phone" class="input_field" />
                    <div class="cleaner h10"></div>

                    <label for="text">Message:</label> <textarea id="text" name="corps" rows="0" cols="0" class="required"></textarea>
                    <div class="cleaner h10"></div>

                    <input type="submit" class="submit_btn" name="submit" id="submit" value="Envoyer" />

                    @endauth
                    @guest
                    <label for="author">Name:</label> <input type="text" id="author" name="nom_envoyeur" class="required input_field" />
                    <div class="cleaner h10"></div>
                    <label for="email">Email:</label> <input type="text" id="email" name="email_envoyeur" class="validate-email required input_field" />
                    <div class="cleaner h10"></div>

                    <label for="phone">Phone:</label> <input type="text" name="numero" id="phone" class="input_field" />
                    <div class="cleaner h10"></div>

                    <label for="text">Message:</label> <textarea id="text" name="corps" rows="0" cols="0" class="required"></textarea>
                    <div class="cleaner h10"></div>

                    <input type="submit" class="submit_btn" name="submit" id="submit" value="Envoyer" />

                    @endguest

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

        <div class="cleaner h40"></div>


        </div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@include('layout.footer')

</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

@endsection
