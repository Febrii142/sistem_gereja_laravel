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
        Schema::create('pelayans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jemaat_id')->constrained('jemaats')->onDelete('cascade');
            $table->foreignId('pelayanan_id')->constrained('pelayanans')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['jemaat_id', 'pelayanan_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelayans');
    }
};
