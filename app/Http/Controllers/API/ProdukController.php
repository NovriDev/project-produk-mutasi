<?php

namespace App\Http\Controllers\API;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Produk::with('lokasis')->get());
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
        $data = $request->validate([
            'nama_produk' => 'required',
            'kode_produk' => 'required|unique:produks',
            'kategori'    => 'required',
            'satuan'      => 'required'
        ]);

        return response()->json(Produk::create($data));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Produk::with('lokasis')->findOrFail($id));
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
        $request->validate([
            'kode_produk' => 'sometimes|unique:produks,kode_produk|string',
            'nama_produk' => 'sometimes|string',
            'kategori' => 'sometimes|string',
            'satuan' => 'sometimes|string'
        ]);
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());
        return response()->json($produk);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json([Produk::destroy($id), 'Berhasil menghapus produk'], 200);
    }

    public function mutasiHistory($id)
    {
        return response()->json(Produk::findOrFail($id)->mutasis()->with(['lokasi', 'user'])->get());
    }
}
