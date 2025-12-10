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
        Schema::create('komsels', function (Blueprint $table) {
            $table->id();
            $table->string('nama_komsel');
            $table->unsignedBigInteger('ketua_id')->nullable();
            $table->unsignedBigInteger('co_leader_id')->nullable();
            $table->string('lokasi_pertemuan')->nullable();
            $table->string('jadwal_pertemuan')->nullable(); // e.g., "Jumat, 19:00"
            $table->text('deskripsi')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komsels');
    }
};
