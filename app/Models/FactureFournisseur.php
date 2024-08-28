<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureFournisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'reception_id',
        'echeance',
        'montantcommande',
        'montantlivraison',
    ];

    public function reception()
    {
        return $this->belongsTo(Reception::class);
    }

    public function reglementfournisseurs()
    {
        return $this->hasMany(ReglementFournisseur::class, 'facture_fournisseur_id');
    }
}
