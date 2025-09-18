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
        Schema::create('program_studis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('upps_id')->constrained('upps')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('jenjang_id')->constrained('jenjangs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->string('initial')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_studis');
    }
};
