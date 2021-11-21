<?php

namespace App\Models;

class Cart
{
    public $items = null;
    public $totalQte = 0;
    public $totalPrix = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQte = $oldCart->totalQte;
            $this->totalPrix = $oldCart->totalPrix;
        }
    }
    public function add($item, $id)
    {
        $storedItem = ['qty' =>0, 'product_price' => $item->product_price, 'item' => $item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['product_price'] = $item->product_price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQte++;
        $this->totalPrix += $item->product_price;
    }
}
