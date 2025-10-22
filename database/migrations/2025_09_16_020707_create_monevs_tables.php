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
        Schema::create('monev_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('category', ['buku', 'tks']);
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('monev_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('monev_table_id')->constrained('monev_tables')->cascadeOnDelete();
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('monev_rows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')->constrained('periodes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('monev_table_id')->constrained('monev_tables')->cascadeOnDelete();
            $table->foreignId('program_studi_id')->constrained('program_studis')->cascadeOnDelete();
            $table->json('data');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monev_rows');
        Schema::dropIfExists('monev_fields');
        Schema::dropIfExists('monev_tables');
    }
};
