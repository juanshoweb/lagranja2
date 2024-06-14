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
        Schema::create('shedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scort_id')->constrained()->onDelete('cascade');
            $table->string('days')->comment('Ej. Lunes a viernes');
            $table->integer('hours')->comment('Ej. 24 horas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shedules');
    }
};
