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
        Schema::create('komsel_meetings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('komsel_id');
            $table->date('tanggal_pertemuan');
            $table->string('tema')->nullable();
            $table->text('materi')->nullable();
            $table->integer('jumlah_hadir')->default(0);
            $table->text('catatan')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komsel_meetings');
    }
};
