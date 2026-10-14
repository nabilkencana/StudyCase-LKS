<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => "required|email",
            'password' => 'required'
        ]);

        $user = User::where('email',$request->email)->first();

        if (!$user || Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau Password salah'
            ]);
        }

        $token = $request->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil!',
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'token' => $token
            ]
        ]);
    }
}
