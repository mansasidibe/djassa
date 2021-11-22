<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bon Djassa - {{ $title }}</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="{{ asset('templatemo_style.css')}}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="{{ asset('nivo-slider.css')}}" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/ddsmoothmenu.css')}}" />

<script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/ddsmoothmenu.js')}}">

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

</head>

<body>

@yield('container.index.users')
@yield('container.panier.users')
@yield('container.faq.users')
@yield('container.propos.users')
@yield('container.contact.users')
@yield('container.login.users')
@yield('container.register.users')
@yield('container.produit.index')
@yield('container.produit.show')
@yield('container.produit.users')
@yield('container.produit.create')
@yield('container.produit.edit')
@yield('container.category.index')
@yield('container.category.create')
@yield('container.category.edit')
@yield('container.admin.index')
@yield('container.user.bycategory')
@yield('container.user.commande')
@yield('container.user.suggestion')
@yield('container.admin.commande.index')


</body>
</html>
