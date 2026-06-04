<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

use App\Exceptions\CityNotFoundException;
use App\Models\City;

class CityController extends Controller
{
    public function all(): Collection
    {
        $city = new City();
        
        return $city->with("country")->get();
    }

    public function insert(Request $request): JsonResponse
    {
        foreach($request->cities as $city){
            City::create($city);
        }

        return response()->json([
            'message' => "City(es) created",
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $city = City::find($id);

        if($city) $city->updateOrFail($request->city);
        else throw new CityNotFoundException();

        return response()->json([
            'message' => "City updated",
        ]);
    }

    public function delete(Request $request, string $id): JsonResponse
    {
        $city = City::find($id);

        if($city) $city->destroy($request->city);
        else throw new CityNotFoundException();

        return response()->json([
            'message' => "City deleted",
        ]);
    }
}
