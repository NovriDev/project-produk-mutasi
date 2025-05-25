<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use App\Models\Mutasi;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MutasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $produk = Produk::first();
        $lokasi = Lokasi::first();

        Mutasi::create([
            'tanggal'      => now(),
            'jenis_mutasi' => 'masuk',
            'jumlah'       => 10,
            'keterangan'   => 'Restok awal',
            'user_id'      => $user->id,
            'produk_id'    => $produk->id,
            'lokasi_id'    => $lokasi->id,
        ]);

        Mutasi::create([
            'tanggal'      => now(),
            'jenis_mutasi' => 'keluar',
            'jumlah'       => 5,
            'keterangan'   => 'Pemakaian harian',
            'user_id'      => $user->id,
            'produk_id'    => $produk->id,
            'lokasi_id'    => $lokasi->id,
        ]);
    }
}
