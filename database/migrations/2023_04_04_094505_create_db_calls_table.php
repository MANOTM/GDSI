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
        Schema::create('db_calls', function (Blueprint $table) {
            $table->id();
            $table->integer('quntite');
            $table->integer('quntite_total');
            $table->foreignId('db_id')->constrained('dbs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('article_id')->constrained('articles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('marche_id')->constrained('marches');
            $table->date('date');
            $table->softDeletes();
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
        Schema::dropIfExists('db_calls');
    }
};
