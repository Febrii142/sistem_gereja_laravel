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
        Schema::create('komsel_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('komsel_id')->constrained('komsels')->onDelete('cascade');
            $table->foreignId('jemaat_id')->constrained('jemaats')->onDelete('cascade');
            $table->date('tanggal_bergabung')->nullable();
            $table->timestamps();
            
            $table->unique(['komsel_id', 'jemaat_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komsel_members');
    }
};
