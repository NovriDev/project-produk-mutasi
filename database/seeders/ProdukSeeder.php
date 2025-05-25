<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::insert([
            [
                'nama_produk' => 'Kabel LAN',
                'kode_produk' => 'PRD001',
                'kategori'    => 'Elektronik',
                'satuan'      => 'pcs',
            ],
            [
                'nama_produk' => 'Mouse Wireless',
                'kode_produk' => 'PRD002',
                'kategori'    => 'Elektronik',
                'satuan'      => 'pcs',
            ],
        ]);
    }
}
