<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable = [
        'reference',
        'date_commande',
        'sous_total',
        'taux_tva',
        'montant_ht',
        'prix_tva',
    ];
}
