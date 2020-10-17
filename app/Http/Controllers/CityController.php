<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return City::all();
    }

    public function show($city_id)
    {
        $city = City::find($city_id);

        return response()->json([
            'data' => $city
        ], 200);
    }

    public function create(Request $request)
    {
        $Paises_Codigo = $request->input('Paises_Codigo');
        $Ciudad = $request->input('Ciudad');
        $city = City::create([
            'Paises_Codigo' => $Paises_Codigo,
            'Ciudad' => $Ciudad
           ]);
        if ($city) {
            return response()->json([
                'data' => [
                    'type' => 'activity items',
                    'message' => 'Success',
                    'id' => $city->id,
                    'attributes' => $city
                ]
            ], 201);
        } else {
            return response()->json([
                'type' => 'activity_items',
                'message' => 'Fail'
            ], 400);
        }
    }

    public function update(Request $request, $city_id)
    {
        $city = City::where('id', $city_id)->first();
        if ($city) {
            $city->Paises_Codigo = $request->input('Paises_Codigo');
            $city->Ciudad = $request->input('Ciudad');
            $city->save();
            return response()->json([
                'data' => [
                    'type' => 'cities',
                    'message' => 'Update Success'
                ]
            ], 201);
        } else {
            return response()->json([
                'type' => 'cities',
                'message' => 'Not Found'
            ], 404);
        }
    }

    public function delete($city_id)
    {
        $city = City::where('id', $city_id)->first();
        if ($city) {
            $city->delete();
            return response()->json([], 204);
        } else {
            return response()->json([
                'type' => 'cities',
                'message' => 'Not Found'
            ], 404);
        }
    }
}
