<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jemaats', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->unsignedBigInteger('keluarga_id')->nullable()->after('komsel_id');
            $table->boolean('status_wakil_keluarga')->default(false)->after('keluarga_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('keluarga_id')->references('id')->on('keluargas')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('jemaats', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['keluarga_id']);
            $table->dropColumn(['user_id', 'keluarga_id', 'status_wakil_keluarga']);
        });
    }
};
