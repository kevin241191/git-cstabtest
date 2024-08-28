<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commander extends Model
{
    use HasFactory;

    protected $fillable = [
        'qtecom',
        'produit_id',
        'commande_id'
    ];

    // public function produit()
    // {
    //     return $this->belongsTo(Produit::class);
    // }

    // public function commande()
    // {
    //     return $this->belongsTo(Commande::class);
    // }
}
