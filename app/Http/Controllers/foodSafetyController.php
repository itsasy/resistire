<?php

namespace App\Http\Controllers;

use App\Models\tb_foodsafety;
use App\Models\tb_foodsafety_types;
use Illuminate\Http\Request;

class foodSafetyController extends Controller
{
    public function index()
    {
        $data = tb_foodsafety_types::paginate(8);

        return view('typesFoodSafety', compact('data'));
    }

    public function create()
    {
        return view('regFoodSafety');
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $data = tb_foodsafety::where('fds_id_fdst', $id)->get();

        $name = tb_foodsafety_types::where('id', $id)->get();

        return view('listFoodSafety', compact('data'))->with(['name' => $name[0]->fdst_desc]);
    }


    public function edit($id)
    {
        $article = tb_foodsafety::where('id', $id)->get();
        return view('updateSeguridadAlimentaria', compact('article'));
    }

    public function update(Request $request, odel $odel)
    {
        //
    }


    public function destroy(odel $odel)
    {
        //
    }
}
