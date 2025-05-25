<?php

namespace App\Http\Controllers\API;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Lokasi::with('produks')->get());
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
            'kode_lokasi' => 'required|unique:lokasis',
            'nama_lokasi' => 'required'
        ]);

        return response()->json(Lokasi::create($data));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Lokasi::with('produks')->findOrFail($id));
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
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($request->only('kode_lokasi', 'nama_lokasi'));
        return response()->json($lokasi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json([Lokasi::destroy($id), 'Berhasil menghapus lokasi'], 200);
    }
}
