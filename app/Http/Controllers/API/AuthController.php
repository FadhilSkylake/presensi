<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || ! Hash::check($request->password, $user->password)) {

            return response([
                'success' => false,
                'data' => null,
                'message' => 'These credentials do not match our records.',
            ], 422);
        }
        $token = $user->createToken('API Token')->plainTextToken;
        return response([
            'success' => true,
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ],
            'message' => 'User logged in successfully',
        ]);
    }
}
