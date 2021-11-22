<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Panier;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $title = "ACCEUIL";
        $count = "";
        $products = Product::all();
        $categories = Category::get();
        if(Auth::user()){
            $users = Auth::user();
            $panier = Panier::where('number', $users->number)->get();
            $count = Panier::where('number', $users->number)->count();
            return view('users.index', compact('title','products','categories','panier','count'));
        }else {
            return view('users.index', compact('title','products','categories', 'count'));
        }
    }

    public function a_propos()
    {
        $title = "A PROPOS";
        $products = Product::get();
        $categories = Category::get();
        $count = "";
        if(Auth::user()){
            $users = Auth::user();
            $panier = Panier::where('number', $users->number)->get();
            $count = Panier::where('number', $users->number)->count();
            return view('users.a_propos', compact('title','products','categories', 'users', 'panier', 'count'));
        }else {
            return view('users.a_propos', compact('title','products','categories'));
        }
    }

    public function faq()
    {
        $title = "FAQ";
        $products = Product::get();
        $categories = Category::get();
        $count = "";
        if(Auth::user()){
            $users = Auth::user();
            $panier = Panier::where('number', $users->number)->get();
            $count = Panier::where('number', $users->number)->count();
            return view('users.faq', compact('title','products','categories', 'users', 'panier', 'count'));
        }else {
            return view('users.faq', compact('title','products','categories'));
        }
    }

    public function contact()
    {
        $title = "CONTACT";
        $products = Product::get();
        $categories = Category::get();
        $count = "";
        if(Auth::user()){
            $users = Auth::user();
            $panier = Panier::where('number', $users->number)->get();
            $count = Panier::where('number', $users->number)->count();
            return view('users.contact', compact('title','products','categories', 'users', 'panier', 'count'));
        }else {
            return view('users.contact', compact('title','products','categories'));
        }
    }

    public function envoieMessage(Request $request)
    {
        // EVOIE DE MESSAGE
    }

    public function panier()
    {
        // if(!Session::has('panier')){

        // }
        // $title = "PANIER";
        // $products = Product::get();
        // $categories = Category::get();
        // $oldCart = Session::get('panier');
        // $panier = new Panier();
        // return view('cart.index', compact('title','products','categories', 'panier', 'oldCart'));

        if(Auth::user()->id)
        {
        $users = Auth::user();
        $title = "PANIER";
        $products = Product::get();
        $categories = Category::get();
        $panier = Panier::where('number', $users->number)->get();
        $count = Panier::where('number', $users->number)->count();
        return view('cart.index', compact('title','products','categories', 'panier', 'count'));
        }

    }

    public function envoiePanier(Request $request)
    {
        // $donnee = $this->validate($request, [
        //     'product_name' => '',
        //     'product_description' => '',
        //     'product_price' => '',
        //     'product_remise' => '',
        //     'product_disponibilite' => '',
        //     'categorie' => '',
        //     'product_photo' => '',
        //     'prix_total' => '',
        //     'client_name' => '',
        //     'client_numero' => '',
        //     'client_adresse' => '',
        //     'adresse_livraison' => '',
        // ]);

        $user = Auth::user();
        $phone = $user->number;

        foreach ($request->product_photo as $key => $productname){
            $order = new Order;
            $order->product_name = $request->product_name[$key];
            $order->product_description = $request->product_description[$key];
            $order->product_price = $request->product_price[$key];
            $order->product_remise = $request->product_remise[$key];
            $order->product_disponibilite = $request->product_disponibilite[$key];
            $order->category = $request->categorie[$key];
            $order->product_photo = $request->product_photo[$key];
            $order->prix_total = $request->prix_total;
            $order->client_name = $request->client_name;
            $order->client_numero = $request->client_numero;
            $order->client_adresse = $request->client_adresse;

            $order->save();
        }

        DB::table('paniers')->where('number', $phone)->delete();

        return redirect()->route('user.suggestion')->with('message', 'commande validée');
    }

    public function addPanier(Request $request, $id)
    {
        if(Auth::id())
        {
            $users = Auth::user();
            $produit = Product::find($id);
            $panier = Panier::create([
                'product_name' => $produit->product_name,
                'product_description' => $produit->product_description,
                'product_price' => $produit->product_price,
                'product_remise' => $produit->product_remise,
                'product_disponibilite' => $produit->product_disponibilite,
                'categorie' => $produit->categorie,
                'product_photo' => $produit->product_photo,
                'number' => $users->number,
            ]);

            return redirect()->route('user.panier')->with('message', 'Produit ajouté avec succès');
        }else {
            return redirect()->route('user.login')->with('message', "Connectez vous s'il vous plait");
        }
    }

    // public function addPanier(Request $request, $id)
    // {
    //     $produit = Product::find($id);
    //     $oldCart = Session::has('panier') ? Session::get('panier') : null;
    //     $cart = new Cart($oldCart);
    //     $cart->add($produit, $produit->id);

    //     $request->session()->put('panier', $cart);
    //     // dd($request->session()->get('panier'));
    //     return redirect()->route('user.panier')->with('message', 'Produit ajouté avec succès');
    // }

    public function removePanier(Panier $id)
    {
        $id->delete();
        return redirect()->back()->with('message', 'Produit supprimé du panier');
    }

    public function login()
    {
        $title = "CONNEXION";
        $products = Product::get();
        $categories = Category::get();
        $count = "";
        if(Auth::user()){
            $users = Auth::user();
            $panier = Panier::where('number', $users->number)->get();
            $count = Panier::where('number', $users->number)->count();
            return view('auth.login', compact('title','products','categories', 'users', 'panier', 'count'));
        }else {
            return view('auth.login', compact('title','products','categories'));
        }
    }

    public function doLogin(Request $request)
    {
        // VALIDATION
        $donnee = $this->validate($request,[
            'email' => '',
            'password' => '',
        ]);

        // VERIFICATION
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->back()->with('message', 'Email/Mot de passe incorrecte!');
        }

        // REDIRECTION
        if (auth()->user()->type_user == 'ADM') {
            return redirect()->route('admin.index');
            }else{
                return redirect()->route('user.index')->with('message', 'Connexion réussie!');
        }
    }

    public function register()
    {
        $title = "INSCRIPTION";
        $products = Product::get();
        $categories = Category::get();
        $count = "";
        if(Auth::user()){
            $users = Auth::user();
            $panier = Panier::where('number', $users->number)->get();
            $count = Panier::where('number', $users->number)->count();
            return view('auth.register', compact('title','products','categories', 'users', 'panier', 'count'));
        }else {
            return view('auth.register', compact('title','products','categories'));
        }
    }

    public function doRegister(Request $request)
    {
        // VALIDATION
        $donnee = $this->validate($request,[
            'name' => '',
            'number' => '',
            'email' => '',
            'password' => '',
        ]);

        // ENVOIE DES DONNEES
        User::create([
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // CREATION DE LA SESSION
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        // REDIRECTION
        return redirect()->route('user.index')->with('message', 'Connexion réussie!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.index')->with('message', 'Déonnexion réussie!');
    }

}
