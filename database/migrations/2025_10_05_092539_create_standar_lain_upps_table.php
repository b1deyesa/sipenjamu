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
        Schema::create('standar_lain_upps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')->constrained('periodes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('standar_lain_id')->constrained('standar_lains')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('description')->nullable();
            $table->text('link')->nullable();
            $table->enum('verification_status', ['pending', 'rejected', 'accepted'])->default('pending');
            $table->boolean('document_status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standar_lain_upps');
    }
};
