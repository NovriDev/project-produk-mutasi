<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function login(Request $request){
        // Validasi request dari API
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Variabel $user yang mengambil email dan mencocokan request email dari model User
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        
        // Membuat token user login
        $token = $user->createToken('token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user]);
    }
}
