<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'lib_cat'
    ];

    public function produits()
    {
        return $this->hasMany(Produit::class, 'categorie_id');
    }

    public function getSlug():string
    {
        return Str::slug($this->nomcat);
    }
}
