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
        Schema::create('pelaksanaan_upps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')->constrained('periodes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('pelaksanaan_id')->constrained('pelaksanaans')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('upps_id')->constrained('upps')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('setting_status')->nullable();
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
        Schema::dropIfExists('pelaksanaan_upps');
    }
};
