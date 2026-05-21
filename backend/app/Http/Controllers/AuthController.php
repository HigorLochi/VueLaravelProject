<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))){
            return response(['error' => 'Invalid credentials'], status: Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();

        $jwt = $user->createToken("token")->plainTextToken;

        $cookie = cookie("jwt", $jwt, 60 * 24);

        return response([
            'message' => $user
        ])->withCookie($cookie);
    }

    public function user(Request $request){
        return $request->user();
    }
}
