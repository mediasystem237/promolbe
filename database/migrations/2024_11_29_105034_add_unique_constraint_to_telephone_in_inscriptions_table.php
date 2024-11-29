<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            // Ajouter la contrainte unique et spécifier la longueur pour 'telephone'
            $table->string('telephone', 9)->unique()->change();  // 9 caractères pour le téléphone
        });
    }

    public function down()
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            // Supprimer la contrainte unique sur la colonne 'telephone'
            $table->dropUnique(['telephone']);
        });
    }

};
