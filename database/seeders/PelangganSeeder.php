<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        Pelanggan::create([
            'nama_pelanggan' => 'Budi Santoso',
            'email'          => 'budi@example.com',
            'password'       => Hash::make('password'),
            'telepon'        => '081234567890',
            'alamat1'        => 'Jl. Merdeka No. 10',
            'alamat2'        => 'Kecamatan Sukamaju',
            'alamat3'        => 'Bandung',
            'kartu_id'       => 'KTP123456789',
            'foto'           => null,
            'tgl_lahir'      => '1998-05-12',
        ]);

        Pelanggan::create([
            'nama_pelanggan' => 'Siti Aisyah',
            'email'          => 'siti@example.com',
            'password'       => Hash::make('password'),
            'telepon'        => '082345678901',
            'alamat1'        => 'Jl. Kenanga No. 5',
            'alamat2'        => 'Kelurahan Melati',
            'alamat3'        => 'Jakarta',
            'kartu_id'       => 'KTP987654321',
            'foto'           => null,
            'tgl_lahir'      => '2000-02-20',
        ]);
    }
}
