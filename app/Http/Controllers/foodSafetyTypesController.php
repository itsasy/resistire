<?php

namespace App\Http\Controllers;

use App\Models\tb_foodsafety_types;
use Illuminate\Http\Request;

class foodSafetyTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $user = [
            'fdst_id_usr' => auth()->user()->id,
            'fdst_id_dst' => auth()->user()->usr_id_dst,
            'fdst_id_prj' => auth()->user()->usr_id_prj,
        ];

        tb_foodsafety_types::create($request->all() + $user);

        return back()->with('message', 'Se ha creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $table = tb_foodsafety_types::findOrFail($id);

        $table->update($request->all());

        $table->save();

        return back()->with('message', 'Se actualizó correctamente');
    }


    public function destroy($id)
    {
        $data = tb_foodsafety_types::findOrFail($id);

        $data->delete();

        return back()->with('message', 'Se ha eliminado correctamente');
    }
}
