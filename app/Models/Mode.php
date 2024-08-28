<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Mode extends Model
{
    use HasFactory;

    protected $fillable = [
        'lib_mode'
    ];

    public function reglements()
    {
        return $this->hasMany(Reglement::class, 'mode_id');
    }

    public function reglementfournisseurs()
    {
        return $this->hasMany(ReglementFournisseur::class, 'mode_id');
    }

    public function getSlug():string
    {
        return Str::slug($this->lib_mode);
    }
}
