<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'reference',
        'nomp',
        'qte',
        'prix_achat',
        'modele',
        'codebarre',
        'groupe_id',
        'categorie_id',
    ];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function commandes():BelongsToMany
    {
        return $this->belongsToMany(Commande::class);
    }

    public function receptions():BelongsToMany
    {
        return $this->belongsToMany(Reception::class);
    }

    public function ventes():BelongsToMany
    {
        return $this->belongsToMany(Vente::class);
    }
}
