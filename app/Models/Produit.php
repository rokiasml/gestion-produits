<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produits';
    protected $primaryKey = 'idproduit';
    public $timestamps = true;

    protected $fillable = [
        'nomproduit', 'prix' , 'descriptionp' , 'image' , 'user_id'
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
}
