<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reception extends Model
{
    use HasFactory;

    protected $fillable = [
        'commande_id',
        'echeance',
        'statut',
        'reference'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function produits(): BelongsToMany
    {
        return $this->belongsToMany(Produit::class);
    }


    public function facturefournisseurs()
    {
        return $this->hasMany(FactureFournisseur::class, 'reception_id');
    }
}
