<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $title = "ACCEUIL";
        $products = Product::all()->random(4);
        $categories = Category::get();
        return view('users.index', compact('title','products','categories'));
    }

    public function a_propos()
    {
        $title = "A PROPOS";
        $products = Product::get();
        $categories = Category::get();
        return view('users.a_propos', compact('title','products','categories'));
    }

    public function faq()
    {
        $title = "FAQ";
        $products = Product::get();
        $categories = Category::get();
        return view('users.faq', compact('title','products','categories'));
    }

    public function contact()
    {
        $title = "CONTACT";
        $products = Product::get();
        $categories = Category::get();
        return view('users.contact', compact('title','products','categories'));
    }

    public function envoieMessage(Request $request)
    {
        // EVOIE DE MESSAGE
    }

    public function panier()
    {
        $title = "PANIER";
        $products = Product::get();
        $categories = Category::get();
        return view('cart.index', compact('title','products','categories'));
    }

    public function envoiePanier(Request $request)
    {
        // PANIER
    }

    public function login()
    {
        $title = "CONNEXION";
        $products = Product::get();
        $categories = Category::get();
        return view('auth.login', compact('title','products','categories'));
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
        return view('auth.register', compact('title','products','categories'));
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
