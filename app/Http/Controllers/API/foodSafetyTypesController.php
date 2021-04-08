<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tb_foodsafety_types;

class foodSafetyTypesController extends Controller
{
    public function index()
    {
        return tb_foodsafety_types::with('info_district')->get();
    }

    public function store(Request $request)
    {
        tb_foodsafety_types::create($request->all());

        return response([
            'type' => 'success',
            'message' => 'Se ha registrado correctamente',
        ], 200);
    }

    public function show($id)
    {
        $data = tb_foodsafety_types::findOrFail($id);

        return response([
            'id' => $data->id,
            'fdst_desc' => $data->fdst_desc,
        ], 200);
    }


    public function update(Request $request, $id)
    {
        $table = tb_foodsafety_types::findOrFail($id);

        $table->update($request->all());

        $table->save();

        return response([
            'type' => 'success',
            'message' => 'Se ha actualizado correctamente',
        ], 200);
    }


    public function destroy($id)
    {
        $data = tb_foodsafety_types::findOrFail($id);

        $status = $data->delete();

        return response([
            'message' => $status ? 'Eliminado correctamente' : null
        ]);
    }
    
    public function types_by_district($dst)
    {
        $articles = tb_foodsafety_types::where('fdst_id_dst', $dst)->get();

        return $articles;
    }
    
    /*NEW FUNCTIONS V1_1*/
    
    public function foodsafetytypes_project_district($fdst_id_prj, $fdst_id_dst)
    {
        try {
            $foodsafety_types = tb_foodsafety_types::where([['fdst_id_prj', $fdst_id_prj],['fdst_id_dst', $fdst_id_dst]])->with('info_district')->orderBy('created_at', 'DESC')->get();

            return $foodsafety_types;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
