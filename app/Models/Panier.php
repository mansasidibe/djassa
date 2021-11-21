<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'product_remise',
        'product_disponibilite',
        'categorie',
        'product_photo',
        'number',
    ];
}
