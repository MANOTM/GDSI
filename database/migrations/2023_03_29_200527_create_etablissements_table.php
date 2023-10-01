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
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('Code_etab'); 
            $table->string('nom');
            $table->string('Division');
            $table->string('Service'); 
            $table->string('Cycle');
            $table->foreignId('db_id')->constrained('dbs');
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
        Schema::dropIfExists('etablisements');
    }
};
