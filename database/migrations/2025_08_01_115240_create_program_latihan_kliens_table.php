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
        Schema::create('program_latihan_klien', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('klien_id');
            $table->string('nama_program');
            $table->integer('durasi_menit');
            $table->date('tanggal');
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_latihan_klien');
    }
};
