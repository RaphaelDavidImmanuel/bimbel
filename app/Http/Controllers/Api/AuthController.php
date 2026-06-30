<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)
                    ->where('role', 'guru')
                    ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {

            return response()->json([
                'success' => false,
                'message' => 'Email atau Password salah'
            ], 401);

        }

        $guru = Guru::where('user_id', $user->id)->first();
        $token = $user->createToken('guru-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'token' => $token,
            'data' => [
                'id' => $guru->id,
                'nama' => $guru->nama,
                'email' => $guru->email,
                'no_hp' => $guru->no_hp,
                'mata_pelajaran' => $guru->mata_pelajaran,
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil'
        ]);
    }
}
