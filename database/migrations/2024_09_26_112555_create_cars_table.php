<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            // $table->string('brand', 70); //one to many con tabella "brands"
            $table->string('model', 90);
            $table->year('production_year');
            $table->string('plate', 15);
            $table->char('vin', 17);
            $table->tinyInteger('n_doors')->unsigned();
            // $table->unsignedTinyInteger('n_doors');
            $table->smallInteger('displacement')->unsigned();
            $table->smallInteger('hp')->unsigned();
            $table->string('fuel', 60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
