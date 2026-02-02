<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'pakets';

   protected $fillable = [
        'nama_paket',
        'jenis',
        'kategori',
        'jumlah_pax',
        'harga_paket',
        'deskripsi',
        'foto1',
        'foto2',
        'foto3'
    ];
     
       const JENIS = ['Prasmanan', 'Box'];

    const KATEGORI = [
        'Pernikahan',
        'Selamatan',
        'Ulang Tahun',
        'Studi Tour',
        'Rapat'
    ];

    public function detailPemesanan()
    {
        return $this->hasMany(DetailPemesanan::class, 'id_paket');
    }
}
