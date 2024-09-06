<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
       'client_id',
       'date',
       'totalTVA',
       'totalHT',
       'totalTTC', 'tauxremise', 'totalremise', 'totalrecu', 'resteapayer', 'montantNet'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function produits():BelongsToMany
    {
        return $this->belongsToMany(Produit::class);
    }

    public function factures()
    {
        return $this->hasMany(Facture::class, 'vente_id');
    }
}
