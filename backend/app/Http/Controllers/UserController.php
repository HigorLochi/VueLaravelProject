<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserCreateRequest;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(User::all(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $user = User::create($request->all());

        return response($user, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(User::find($id), Response::HTTP_OK);
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

            return reponse($user, Response::HTTP_CREATED);
        }else{
            return reponse(false, Response::HTTP_NOT_FOUND);
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

            return reponse($user, Response::HTTP_OK);
        }else{
            return reponse(false, Response::HTTP_NOT_FOUND);
        }
    }
}
