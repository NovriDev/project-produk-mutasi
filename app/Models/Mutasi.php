<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'jenis_mutasi',
        'jumlah',
        'keterangan',
        'user_id',
        'produk_id',
        'lokasi_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}
