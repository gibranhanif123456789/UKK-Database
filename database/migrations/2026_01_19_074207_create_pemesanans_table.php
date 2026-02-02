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
        Schema::create('pemesanans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('id_pelanggan')
          ->constrained('pelanggans')
          ->onDelete('cascade');
    $table->foreignId('id_jenis_bayar')
          ->constrained('jenis_pembayarans')
          ->onDelete('cascade');
    $table->string('no_resi')->unique();
    $table->dateTime('tgl_pesan');
    $table->bigInteger('total_bayar');
    $table->enum('status_pesan', ['Menunggu Konfirmasi', 'Sedang Diproses', 'Menunggu Kurir']);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
