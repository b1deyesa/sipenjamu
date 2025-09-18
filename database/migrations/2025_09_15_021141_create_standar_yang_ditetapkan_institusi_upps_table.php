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
        Schema::create('standar_yang_ditetapkan_institusi_upps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('standar_yang_ditetapkan_institusi_id')->constrained('standar_yang_ditetapkan_institusis', 'id')->cascadeOnUpdate()->cascadeOnDelete()->index('fk_standar_id');
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
        Schema::dropIfExists('standar_yang_ditetapkan_institusi_upps');
    }
};
