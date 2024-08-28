<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'vente_id',
        'reference',
        'echeance'
    ];

    public function vente()
    {
        return $this->belongsTo(Vente::class);
    }

    public function reglements()
    {
        return $this->hasMany(Reglement::class, 'facture_id');
    }
}
