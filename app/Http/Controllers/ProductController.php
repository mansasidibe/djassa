<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        //
        $title = "PRODUITS";
        $products = Product::get();
        $categories = Category::get();
        return view('product.index', compact('title', 'products', 'categories'));
    }

    public function show(Product $id)
    {
        //
        $title = "VOIR PRODUIT";
        $categories = Category::get();
        return view('product.show', compact('title', 'id', 'categories'));
    }

    public function byCategory($libele)
    {
        $title = "RECHERCHE";
        $products = Product::where('categorie', $libele)->get();
        $categories = Category::get();
        return view('product.byCategory', compact('title', 'products', 'categories'));
    }

}
