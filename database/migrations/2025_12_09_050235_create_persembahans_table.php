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
        Schema::create('persembahans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_persembahan');
            $table->enum('jenis_persembahan', ['Perpuluhan', 'Syukur', 'Kolekte', 'Misi', 'Pembangunan', 'Lainnya']);
            $table->decimal('nominal', 15, 2);
            $table->text('keterangan')->nullable();
            $table->string('nama_pemberi')->nullable();
            $table->enum('metode_pembayaran', ['Tunai', 'Transfer', 'Kartu', 'Lainnya'])->default('Tunai');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persembahans');
    }
};
