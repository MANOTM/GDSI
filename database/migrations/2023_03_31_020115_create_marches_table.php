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
        Schema::create('marches', function (Blueprint $table) {
            $table->id();
            $table->string('code',20);
            $table->string('type',50);
            $table->date('date',50);
            $table->string('objet')->default('- ');
            $table->year('annee');
            $table->float('montant');
            $table->string('entreprise')->nullable();
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('marches');
    }
};
