<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        //
        $title = "PRODUITS";
        $products = Product::get();
        $categories = Category::get();
        $count = "";
        if(Auth::user()){
            $users = Auth::user();
            $panier = Panier::where('number', $users->number)->get();
            $count = Panier::where('number', $users->number)->count();
            return view('product.index', compact('title', 'products', 'categories', 'count', 'users', 'panier'));
        }else {
            return view('product.index', compact('title', 'products', 'categories'));
        }
    }

    public function show(Product $id)
    {
        //
        $title = "VOIR PRODUIT";
        $categories = Category::get();
        $count = "";
        if(Auth::user()){
            $users = Auth::user();
            $panier = Panier::where('number', $users->number)->get();
            $count = Panier::where('number', $users->number)->count();
            return view('product.show', compact('title', 'id', 'categories', 'count', 'users', 'panier'));
        }else {
            return view('product.show', compact('title', 'id', 'categories'));
        }
    }

    public function byCategory($libele)
    {
        $title = "RECHERCHE PAR CATEGORIE";
        $products = Product::where('categorie', $libele)->get();
        $categories = Category::get();
        $count = "";
        if(Auth::user()){
            $users = Auth::user();
            $panier = Panier::where('number', $users->number)->get();
            $count = Panier::where('number', $users->number)->count();
            return view('product.byCategory', compact('title', 'products', 'categories', 'count', 'users', 'panier'));
        }else {
            return view('product.byCategory', compact('title', 'products', 'categories'));
        }
    }

}
