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
        Schema::create('pengukuran_klien', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('klien_id');
            $table->integer('no_urut_pengukuran')->nullable();
            $table->date('tanggal');
            $table->float('berat_badan');
            $table->float('weist_circumference');
            $table->float('body_fat');
            $table->float('visceral_fat');
            $table->float('bmi');
            $table->float('body_age');
            $table->float('fat_whole_body');
            $table->float('fat_trunk');
            $table->float('fat_arm');
            $table->float('fat_leg');
            $table->float('muscle_leg');
            $table->float('muscle_arm');
            $table->float('muscle_trunk');
            $table->float('muscle_whole_body');
            $table->float('leher');
            $table->float('lengan_kanan_atas');
            $table->float('lengan_kanan_bawah');
            $table->float('lengan_kiri_atas');
            $table->float('lengan_kiri_bawah');
            $table->float('dada');
            $table->float('pinggang');
            $table->float('perut');
            $table->float('panggul');
            $table->float('paha_kanan');
            $table->float('paha_kiri');
            $table->float('betis_kiri');
            $table->float('betis_kanan');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengukuran_klien');
    }
};
