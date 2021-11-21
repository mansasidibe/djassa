@extends('layout.header')

@section('container.category.index')

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
        	<h1>Toutes les catégories </h1>
            <div class="content_half float_l">
                @if (Session('message'))
                <p style="color:green;">{{ session('message') }}</p>
            @endif
                <table width="680px" cellspacing="0" cellpadding="5">
                    <tr bgcolor="#ddd">
                       <th width="180" align="left">Libélé </th>
                       <th width="90"> Action </th>

                 </tr>
                 @if ($categories->count())
                     @foreach ($categories as $category)
                     <tr>
                        <td align="left">{{$category->libele}} </td>
                        <td align="center"> <a href="{{ route('category.destroy', $category) }}"><img src="{{asset('images/remove_x.gif')}}" alt="remove" /><br />Supprimer</a> </td>
                    </tr>
                     @endforeach
                 @else
                    <p>Pas de catégorie!</p>
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
