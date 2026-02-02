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
        Schema::create('pengiriman', function (Blueprint $table) {
    $table->id();
    $table->dateTime('tgl_kirim')->nullable();
    $table->dateTime('tgl_tiba')->nullable();
    $table->enum('status_kirim', ['Sedang Dikirim', 'Tiba Di Tujuan']);
    $table->string('bukti_foto')->nullable();
    $table->foreignId('id_pesan')
          ->constrained('pemesanans')
          ->onDelete('cascade');
    $table->foreignId('id_user')
          ->constrained('users')
          ->onDelete('cascade');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
