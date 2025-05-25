<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(User::all());
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
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['password'] = Hash::make($data['password']);

        return response()->json(User::create($data));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(User::findOrFail($id));
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
            'name' => 'sometimes|required|string',
            'email' => 'sometimes|required|email',
            'password' => 'nullable|min:6'
        ]);

        $user = User::findOrFail($id);
        $data = $request->only(['name', 'email']);

        Log::info('User Update Request:', $request->all());

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        Log::info("Updating user {$id} with data:", $data);

        $user->update($data);

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json([User::destroy($id), 'Berhasil menghapus user'],200);
    }

    public function mutasiHistory($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user->mutasis()->with(['produk', 'lokasi'])->get());
    }
}
