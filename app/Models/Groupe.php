<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 
        'etiquette',
        'group',
        'taux'
    ];

    public function produits()
    {
        return $this->hasMany(Produit::class, 'groupe_id');
    }
}
