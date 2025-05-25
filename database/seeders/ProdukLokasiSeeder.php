<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukLokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produk1 = Produk::where('kode_produk', 'PRD001')->first();
        $produk2 = Produk::where('kode_produk', 'PRD002')->first();

        $lokasi1 = Lokasi::where('kode_lokasi', 'L001')->first();
        $lokasi2 = Lokasi::where('kode_lokasi', 'L002')->first();

        $produk1->lokasis()->attach($lokasi1->id, ['stok' => 100]);
        $produk1->lokasis()->attach($lokasi2->id, ['stok' => 50]);

        $produk2->lokasis()->attach($lokasi1->id, ['stok' => 75]);
        $produk2->lokasis()->attach($lokasi2->id, ['stok' => 25]);
    }
}
