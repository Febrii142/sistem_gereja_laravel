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
        Schema::create('jadwal_pelayans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_ibadah_id')->constrained('jadwal_ibadahs')->onDelete('cascade');
            $table->foreignId('pelayan_id')->constrained('pelayans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelayans');
    }
};
