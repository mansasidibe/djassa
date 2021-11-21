<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $title = "ADMIN";
        return view('admin.index', compact('title'));
    }

    public function index_category()
    {
        $title = "CATEGORIES";
        $categories = Category::get();
        return view('category.index', compact('title', 'categories'));
    }


    public function create_category()
    {
        //
        $title = "AJOUT DE CATEGORIE";
        return view('category.create', compact('title'));
    }

    public function store_category(Request $request)
    {
        $donnee = $request->validate([
            'libele' => 'required|max:255'
        ]);

        Category::create($donnee);

        return redirect()->route('admin.category.index')->with('message', 'Catégorie ajoutée avec succès!');
    }

    public function edit_category(Category $category)
    {
        //
        $title = "EDITER CATEGORIE";
        return view('category.create', compact('title', 'category'));
    }


    public function update_category(Request $request, Category $id)
    {
        //
    }

    public function destroy_category(Category $id)
    {
        $id->delete();
        return redirect()->back()->with('message', 'Catégorie supprimée');
    }


    // PRODUIT

    public function index_product()
    {
        $title = "PRODUITS";
        $produits = Product::get();
        return view('admin.all_produit', compact('title', 'produits'));
    }

    public function create_product()
    {
        //
        $title = "CREATION PRODUIT";
        $categories = Category::get();
        return view('product.create', compact('title', 'categories'));
    }

    public function store_product(Request $request)
    {
        // VALIDATION
        $donnee = $this->validate($request,[
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_remise' => 'required',
            'product_disponibilite' => 'required',
            'categorie' => 'required',
            'product_photo' => 'required|image',
            'proprietaire' =>'required',
            'num_proprietaire' => 'required',
        ]);

        $path= request('product_photo')->store('img','public');

        // ENVOIE DANS LA BD
        Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'product_remise' => $request->product_remise,
            'product_disponibilite' => $request->product_disponibilite,
            'categorie' => $request->categorie,
            'product_photo' => $path,
            'proprietaire' => $request->proprietaire,
            'num_proprietaire' => $request->num_proprietaire,
        ]);

        // REDIRECTION
        return redirect()->route('admin.product.index')->with('message', 'Produit ajouté avec succès!');
    }

    public function edit_product(Product $id)
    {
        //
        $title = "EDITER PRODUIT";
        $categories = Category::get();
        return view('product.edit', compact('title', 'id', 'categories'));
    }

    public function update_product(Request $request, Product $id)
    {
        //
    }

    public function destroy_product(Product $id)
    {
        //
        $id->delete();
        return redirect()->back()->with('message', 'produit supprimé');
    }
}
