<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReglementFournisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'facture_fournisseur_id',
        'mode_id',
        'montantpaie',
        'resteapayer',
        'resteavant',
    ];

    public function factureFournisseur()
    {
        return $this->belongsTo(FactureFournisseur::class);
    }

    public function mode()
    {
        return $this->belongsTo(Mode::class);
    }
}
