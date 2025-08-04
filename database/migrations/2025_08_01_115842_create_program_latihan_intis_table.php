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
        Schema::create('program_latihan_inti', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_latihan_id');
            $table->string('target_otot');
            $table->string('gerakan');
            $table->string('alat');
            $table->string('set');
            $table->string('rep');
            $table->string('rest');
            $table->string('tempo');
            $table->string('set_1')->nullable();
            $table->string('set_2')->nullable();
            $table->string('set_3')->nullable();
            $table->string('set_4')->nullable();
            $table->string('set_5')->nullable();
            $table->string('beban_1')->nullable();
            $table->string('beban_2')->nullable();
            $table->string('beban_3')->nullable();
            $table->string('beban_4')->nullable();
            $table->string('beban_5')->nullable();
            $table->boolean('is_done')->default(false);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_latihan_inti');
    }
};
