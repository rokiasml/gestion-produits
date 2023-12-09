<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->date('date_commande');
            $table->decimal('sous_total');
            $table->decimal('taux_tva');
            $table->decimal('montant_ht');
            $table->decimal('prix_tva');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('factures');
    }
};
