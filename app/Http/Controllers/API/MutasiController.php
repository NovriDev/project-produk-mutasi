<?php

namespace App\Http\Controllers\API;

use App\Models\Lokasi;
use App\Models\Mutasi;
use App\Models\Produk;
use Illuminate\Http\Request;

class MutasiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Mutasi::with(['produk', 'lokasi', 'user'])->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'lokasi_id' => 'required|exists:lokasis,id',
            'tanggal' => 'required|date',
            'jenis_mutasi' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        $user = auth()->user();

        // Ambil relasi pivot
        $produk = Produk::findOrFail($request->produk_id);
        $lokasi = Lokasi::findOrFail($request->lokasi_id);

        // Ambil stok dari pivot
        $pivot = $produk->lokasis()->where('lokasi_id', $lokasi->id)->first();
        if (!$pivot) {
            return response()->json(['message' => 'Produk tidak tersedia di lokasi ini'], 404);
        }

        $currentStok = $pivot->pivot->stok;

        // Update stok
        if ($request->jenis_mutasi == 'masuk') {
            $newStok = $currentStok + $request->jumlah;
        } else {
            if ($currentStok < $request->jumlah) {
                return response()->json(['message' => 'Stok tidak mencukupi'], 400);
            }
            $newStok = $currentStok - $request->jumlah;
        }

        // Update pivot
        $produk->lokasis()->updateExistingPivot($lokasi->id, ['stok' => $newStok]);

        // Simpan mutasi
        Mutasi::create([
            'user_id' => $user->id,
            'produk_id' => $produk->id,
            'lokasi_id' => $lokasi->id,
            'tanggal' => $request->tanggal,
            'jenis_mutasi' => $request->jenis_mutasi,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);

        return response()->json(['message' => 'Mutasi berhasil diproses']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json(Mutasi::destroy($id));
    }
}
