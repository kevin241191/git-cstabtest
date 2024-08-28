<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptionner extends Model
{
    use HasFactory;

    protected $fillable = [
        'reception_id',
        'produit_id',
        'qterecu'
    ];
}
