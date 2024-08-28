<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'raisonsociale',
        'adresse',
        'telephone',   
        'email',
        'ifu',
        'rccm'
    ];

    public function commandes() 
    {
        return $this->hasMany(Commande::class, 'fournisseur_id');
    }
}
