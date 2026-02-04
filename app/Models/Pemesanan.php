<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanans';
    const STATUS_MENUNGGU_KONFIRMASI = 'Menunggu Konfirmasi';
    const STATUS_DIPROSES = 'Sedang Diproses';
    const STATUS_MENUNGGU_KURIR = 'Menunggu Kurir';


    
    protected $fillable = [
        'id_pelanggan',
        'id_jenis_bayar',
        'no_resi',
        'tgl_pesan',
        'status_pesan',
        'total_bayar'
    ];


    protected $casts = [
        'tgl_pesan' => 'datetime',
    ];
     const STATUS = [
        'Menunggu Konfirmasi',
        'Sedang Diproses',
        'Menunggu Kurir'
    ];
    

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function jenisPembayaran()
    {
        return $this->belongsTo(JenisPembayaran::class, 'id_jenis_bayar');
    }

    public function detailPemesanan()
    {
        return $this->hasMany(DetailPemesanan::class, 'id_pemesanan');
    }

    public function pengiriman()
    {
        return $this->hasOne(Pengiriman::class, 'id_pesan');
    }
}
