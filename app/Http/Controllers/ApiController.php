<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status' => 200,
                'token' => $token,
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Login yoki parol noto\'g\'ri'
            ], 401);
        }
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Foydalanuvchi muvaffaqiyatli chiqib ketdi'
        ], 200);
    }

    public function alluser(){
        return response()->json([
            'users' => User::get()
        ], 200);
    }
}
