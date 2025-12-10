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
        Schema::create('jadwal_ibadahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ibadah');
            $table->dateTime('tanggal_waktu');
            $table->string('lokasi')->nullable();
            $table->string('tema_ibadah')->nullable();
            $table->text('ayat_bacaan')->nullable();
            $table->string('pendeta')->nullable();
            $table->string('pengkhotbah')->nullable();
            $table->string('singer')->nullable();
            $table->string('worship_team')->nullable();
            $table->string('operator_multimedia')->nullable();
            $table->string('penyambut')->nullable();
            $table->string('usher')->nullable();
            $table->string('kolektan')->nullable();
            $table->string('pembaca_firman')->nullable();
            $table->string('doa')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_ibadahs');
    }
};
