<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminController;


// ROUTE USER
Route::get('/',[Controller::class, 'index'])->name('user.index');
Route::get('/about',[Controller::class, 'a_propos'])->name('user.a_propos');
Route::get('/faq',[Controller::class, 'faq'])->name('user.faq');
Route::get('/contact',[Controller::class, 'contact'])->name('user.contact');
Route::post('/contact',[Controller::class, 'envoieMessage'])->name('user.envoieMessage');

Route::get('/panier',[Controller::class, 'panier'])->name('user.panier');
Route::post('/panier',[Controller::class, 'envoiePanier'])->name('user.envoiePanier');


Route::get('/commande',[OrderController::class, 'commande'])->name('user.commande');


// Cart
Route::post('/add_panier/{id}',[Controller::class, 'addPanier'])->name('user.ajoutPanier');
Route::get('/remove_panier/{id}',[Controller::class, 'removePanier'])->name('user.supprimePanier');


// ROUTE AUTHENTIFICATION
Route::get('/login',[Controller::class, 'login'])->name('user.login');
Route::post('/dologin',[Controller::class, 'doLogin'])->name('user.doLogin');
Route::get('/register',[Controller::class, 'register'])->name('user.register');
Route::post('/doregister',[Controller::class, 'doRegister'])->name('user.doRegister');
Route::get('/logout',[Controller::class, 'logout'])->name('user.logout');

// ROUTE CATEGORIE
Route::get('/category',[CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{id}',[CategoryController::class, 'show'])->name('category.show');

//RECHERCHE PAR CATEGORIE
Route::get('/bycategorie/{libele}',[ProductController::class, 'byCategory'])->name('bycategorie');


// ROUTE PRODUIT
Route::get('/product',[ProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}',[ProductController::class, 'show'])->name('product.show');

// ROUTE MESSAGE
Route::get('/order',[OrderController::class, 'index'])->name('order.index');
Route::get('/order/create',[OrderController::class, 'create'])->name('order.create');
Route::post('/order',[OrderController::class, 'store'])->name('order.store');
Route::get('/order/{order}',[OrderController::class, 'show'])->name('order.show');
Route::get('/order/{order}/edit',[OrderController::class, 'edit'])->name('order.edit');
Route::patch('/order/{order}',[OrderController::class, 'update'])->name('order.update');
Route::delete('/order/{order}',[OrderController::class, 'destroy'])->name('order.destroy');

// ROUTE MESSAGE
Route::get('/message',[MessageController::class, 'index'])->name('message.index');
Route::get('/message/create',[MessageController::class, 'create'])->name('message.create');
Route::post('/message',[MessageController::class, 'store'])->name('message.store');
Route::get('/message/{message}',[MessageController::class, 'show'])->name('message.show');
Route::get('/message/{message}/edit',[MessageController::class, 'edit'])->name('message.edit');
Route::patch('/message/{message}',[MessageController::class, 'update'])->name('message.update');
Route::delete('/message/{message}',[MessageController::class, 'destroy'])->name('message.destroy');


// ROUTE ADMIN CATEGORIE
Route::get('/admin',[AdminController::class, 'index'])->name('admin.index')->middleware('is_admin');
Route::get('/admin/category/index',[AdminController::class, 'index_category'])->name('admin.category.index');
Route::get('/admin/category/create',[AdminController::class, 'create_category'])->name('category.create');
Route::post('/admin/category',[AdminController::class, 'store_category'])->name('category.store');
Route::get('/admin/category/{id}/edit',[AdminController::class, 'edit_category'])->name('category.edit');
Route::patch('/admin/category/{id}',[AdminController::class, 'update_category'])->name('category.update');
Route::get('/admin/category/{id}',[AdminController::class, 'destroy_category'])->name('category.destroy');

// ROUTE ADMIN PRODUIT
Route::get('/admin/produit/index',[AdminController::class, 'index_product'])->name('admin.product.index');
Route::get('/admin/product/create',[AdminController::class, 'create_product'])->name('product.create');
Route::post('/admin/product',[AdminController::class, 'store_product'])->name('product.store');
Route::get('/admin/product/{id}/edit',[AdminController::class, 'edit_product'])->name('product.edit');
Route::patch('/admin/product/{id}',[AdminController::class, 'update_product'])->name('product.update');
Route::get('/admin/product/{id}',[AdminController::class, 'destroy_product'])->name('product.destroy');
