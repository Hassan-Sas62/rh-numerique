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
    Schema::create('conges', function (Blueprint $table) {
        $table->id();
        $table->foreignId('employe_id')->constrained()->onDelete('cascade');
        $table->date('date_debut');
        $table->date('date_fin');
        $table->string('motif');
        $table->string('statut')->default('En attente');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conges');
    }
};
