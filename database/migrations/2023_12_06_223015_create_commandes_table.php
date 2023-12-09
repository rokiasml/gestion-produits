<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('facture_id');
            $table->integer('quantite');
            $table->decimal('prix', 10, 2);
            $table->enum('payment_type', ['cash', 'credit card']);
            $table->enum('payment_statut', ['payé', 'en cours', 'livrée', 'annulée']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('facture_id')->references('id')->on('factures');
        });
    }

    public function down()
    {
        Schema::dropIfExists('commandes');
    }
};
