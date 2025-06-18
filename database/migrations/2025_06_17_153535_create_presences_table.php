<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employe_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->boolean('est_present')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presences');
    }
};
