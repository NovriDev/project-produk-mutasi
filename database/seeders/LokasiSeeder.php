<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lokasi::insert([
            [
                'kode_lokasi' => 'L001',
                'nama_lokasi' => 'Gudang Utama',
            ],
            [
                'kode_lokasi' => 'L002',
                'nama_lokasi' => 'Cabang Surabaya',
            ],
        ]);
    }
}
