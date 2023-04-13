<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etablisement_calls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained('articles')->cascadeOnDelete();
            $table->foreignId('etablisement_id')->constrained('etablissements')->cascadeOnDelete();
            $table->foreignId('marche_id')->constrained('marches');
            $table->integer('quantite');
            $table->integer('quantiteTotal');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etablisement_calls');
    }
};
