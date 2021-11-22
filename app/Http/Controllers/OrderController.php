<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Panier;
use App\Models\Suggestion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "TOUTES LES COMMANDES";
        $order = Order::get();
        $categories = Category::get();
        Carbon::setLocale('fr');
        return view('admin.order.index', compact('title','order','categories'));
    }

    public function suggestion()
    {
        $title = "SUGGESTIONS";
        $categories = Category::get();
        $users = Auth::user();
        $count = Panier::where('number', $users->number)->count();
        return view('cart.suggestion', compact('title', 'count', 'categories'));
    }

    public function send_suggestion(Request $request)
    {
        $donnee = $request->validate([
            'nom_envoyeur' => 'required',
            'email_envoyeur' => '',
            'numero' => '',
            'corps' => 'required',
        ]);

        Suggestion::create($donnee);

        return redirect()->route('user.index')->with('message', $request->nom_envoyeur.', votre message a bien été envoyé!');
    }


    public function destroy(Order $id)
    {
        $id->delete();
        return redirect()->back()->with('message', 'Commande supprimée avec succès!');

    }
}
