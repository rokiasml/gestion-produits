<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('commandeproduits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produit_id');
            $table->unsignedBigInteger('commande_id');
            $table->integer('quantite');
            $table->decimal('prix_produit', 10, 2);

          
            $table->foreign('produit_id')->references('idproduit')->on('produits');
            $table->foreign('commande_id')->references('id')->on('commandes');

       
            $table->foreign('prix_produit')->references('prix')->on('produits');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commandeproduits');
    }
};
