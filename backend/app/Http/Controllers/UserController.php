<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return User::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(User::where('id', $id)->exists()){
            $user = User::find($id);

            $user->title = $request->title;
            $user->description = $request->description;
            $user->danger_level = $request->danger_level;
            $user->postal_code = $request->postal_code;
            $user->user_id = $request->user_id;

            $user->save();

            return reponse()->json([
                "message" => "User updated succesfully"
            ], 200);
        }else{
            return reponse()->json([
                "message" => "User not found"
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(User::where('id', $id)->exists()){
            $user = User::find($id);

            $user->delete();

            return reponse()->json([
                "message" => "User deleted succesfully"
            ], 200);
        }else{
            return reponse()->json([
                "message" => "User not found"
            ], 400);
        }
    }
}
