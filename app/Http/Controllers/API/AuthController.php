<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        try {
            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                $data = [
                    'status' => true,
                    'message' => 'Login success',
                    'data' => [
                        'access_token' => $user->createToken('authToken')->plainTextToken,
                        'user' => [
                            'name' => $user->name,
                            'email' => $user->email,
                        ],
                    ]
                ];

                return response()->json($data, 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid credentials'
                ], 401);
            }
        } catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function logout(Request $request){
        try {
            $request->user()->tokens()->delete();
            $data = [
                "status" => true,
                "message" => "Logout successful"
            ];
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ], 500);
        }
    }
}