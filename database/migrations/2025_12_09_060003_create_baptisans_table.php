<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('baptisans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jemaat_id');
            $table->date('tanggal_baptis');
            $table->string('tempat_baptis')->nullable();
            $table->string('pendeta_pembaptis')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('jemaat_id')->references('id')->on('jemaats')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('baptisans');
    }
};
