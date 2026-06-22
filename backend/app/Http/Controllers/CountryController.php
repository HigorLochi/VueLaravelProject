<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

use App\Exceptions\CountryNotFoundException;
use App\Models\Country;

class CountryController extends Controller
{
    public function search(Request $request)
    {
        return Country::where($request->where)->paginate(isset($request->limitPerPage) ? $request->limitPerPage : null);
    }

    public function getbyid(Request $request, string $id): Country{
        return Country::find($id);
    }

    public function insert(Request $request): JsonResponse
    {
        foreach($request->countries as $country){
            Country::create(country);
        }

        return response()->json([
            'message' => "Country(es) created",
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $country = Country::find($id);

        if($country) $country->update($request->all());
        else throw new CountryNotFoundException();

        return response()->json([
            'message' => "Country updated",
        ]);
    }

    public function delete(Request $request, string $id): JsonResponse
    {
        $country = Country::find($id);

        if($country) $country->delete();
        else throw new CountryNotFoundException();

        return response()->json([
            'message' => "Country deleted",
        ]);
    }
}
