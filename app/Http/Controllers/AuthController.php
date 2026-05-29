<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

use App\Exceptions\InvalidCredentialsException;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email'=>'required|string|email',
            'password'=>'required'
        ]);
        
        $user = User::where('email',$credentials['email'])->first();

        if(!$user || !Hash::check($credentials['password'], $user->password))
            throw new InvalidCredentialsException();

        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
        
        return response()->json([
            'access_token' => $token,
        ]);
    }
}
