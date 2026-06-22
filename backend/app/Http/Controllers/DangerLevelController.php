<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

use App\Exceptions\CityNotFoundException;
use App\Models\DangerLevel;

class DangerLevelController extends Controller
{
    public function search(Request $request)
    {
        return DangerLevel::where($request->where)->paginate(isset($request->limitPerPage) ? $request->limitPerPage : null);
    }

    public function getbyid(Request $request, string $id): DangerLevel{
        return DangerLevel::find($id);
    }

    public function insert(Request $request): JsonResponse
    {
        foreach($request->levels as $level){
            DangerLevel::create(level);
        }

        return response()->json([
            'message' => "Level(s) created",
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $level = DangerLevel::find($id);

        if($level) $level->update($request->all());
        else throw new CityNotFoundException();

        return response()->json([
            'message' => "Level updated",
        ]);
    }

    public function delete(Request $request, string $id): JsonResponse
    {
        $level = DangerLevel::find($id);

        if($level) $level->delete();
        else throw new CityNotFoundException();

        return response()->json([
            'message' => "Level deleted",
        ]);
    }
}
