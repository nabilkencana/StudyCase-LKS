<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)  {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email' , $request->email)->first();

        if (!$user || !Hash::check($request->password , $user->password)) {
            return response()->json([
                'status' => 'auth_failed',
                'message' => 'email atau password salah'
            ],422);
        }

        $token = $user->CreateToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil!',
            'accessToken' => $token,
            'data' => [
                'id' => $user->id,
                'nama' => $user->name,
                'email' => $user->email,
                'token' => $token,
                'role' => $user->role
            ]
        ],200);
    }

    public function logout(Request $request)  {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'success' => true,
            'message' => 'Logout Berhasil!',
        ]);
    }
}
