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
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('treatment_id')->constrained('treatments')->onDelete('cascade');

            $table->string('name_medication');
            $table->string('dosage');
            $table->string('frequency')->comment('Ej: 500mg');
            $table->integer('duration')->comment('Duración en días');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};
