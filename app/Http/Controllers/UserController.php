<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

use App\Exceptions\UserNotFoundException;
use App\Models\User;
 
class UserController extends Controller
{
    public function all(): Collection
    {
        return User::all();
    }

    public function insert(Request $request): JsonResponse
    {
        User::insert($request->users);

        return response()->json([
            'message' => "User(s) created",
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $user = User::find($id);

        if($user) $user->updateOrFail($request->user);
        else throw new UserNotFoundException();

        return response()->json([
            'message' => "User updated",
        ]);
    }

    public function delete(Request $request, string $id): JsonResponse
    {
        $user = User::find($id);

        if($user) $user->destroy($request->user);
        else throw new UserNotFoundException();

        return response()->json([
            'message' => "User deleted",
        ]);
    }

    public function helper(Request $request): String
    {
        return Hash::make($request->password);
    }
}