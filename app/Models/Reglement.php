<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'facture_id',
        'mode_id',
        'montantpaie',
        'resteapayer',
        'resteavant',
    ];

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }

    public function mode()
    {
        return $this->belongsTo(Mode::class);
    }

}
