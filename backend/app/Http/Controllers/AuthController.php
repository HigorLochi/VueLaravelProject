<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Exceptions\InvalidCredentialsException;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) : JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($credentials)){
            throw new InvalidCredentialsException();
        }

        $request->session()->regenerate();

        return response()->json(['id' => Auth::user()->id, 'name' => Auth::user()->name]);
    }

    public function logout(Request $request) : JsonResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'success', 'user' => false]);
    }
}
