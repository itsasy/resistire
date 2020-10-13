<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\foodSafetyTypeCollection;
use App\Http\Resources\foodSafetyTypeResource;
use App\Models\tb_foodsafety_types;

class foodSafetyTypesController extends Controller
{
    public function index()
    {
        $types = tb_foodsafety_types::all();

        return foodSafetyTypeCollection::make($types);
    }

    public function store(Request $request)
    {
        $data = tb_foodsafety_types::create($request->all());

        return foodSafetyTypeResource::make($data);
    }

    public function show(tb_foodsafety_types $types_foodsafety)
    {
        return foodSafetyTypeResource::make($types_foodsafety);

    }

    public function update(Request $request, tb_foodsafety_types $types_foodsafety)
    {
        $types_foodsafety->update($request->all());

        return foodSafetyTypeResource::make($types_foodsafety);
    }

    public function destroy(tb_foodsafety_types $types_foodsafety)
    {
        $status = $types_foodsafety->delete();

        return response([
            'message' => $status ? 'Eliminado correctamente' : null
        ]);
    }
}
