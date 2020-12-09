<?php

namespace App\Http\Controllers;

use App\models\tb_companies;
use App\models\tb_company_types;
use Illuminate\Http\Request;

class CompaniesTypeController extends Controller
{
    public function index()
    {
        $categories = tb_company_types::all();
        return view('typesCompanies', compact('categories'));
    }

    public function store(Request $request)
    {
        tb_company_types::create($request->all());

        return back()->with('message', 'Se ha creado correctamente');
    }

    /*public function show($id)
    {
        $name = tb_company_types::where('id', $id)->get();

        if (auth()->user()->usr_id_dst == 1090) {
            $data = tb_companies::where('cmp_id_cmpt', $id)->where('cmp_id_dst', 1090)->get();
        }else{
            $data = tb_companies::where('cmp_id_cmpt', $id)->get();
        }

        return view('listCompanies', compact('data'))->with(['name' => $name[0]->cmpt_desc]);
    }*/
    
    public function show($id)
    {
        $cmp_type = tb_company_types::where('id', $id)->get();

        if (auth()->user()->usr_id_dst == 1090) {
            $data = tb_companies::where('cmp_id_cmpt', $id)->where('cmp_id_dst', 1090)->get();
        } elseif (auth()->user()->usr_id_dst == 1347) {
            $data = tb_companies::where('cmp_id_cmpt', $id)->where('cmp_id_dst', 1347)->get();
        }else{
            $data = tb_companies::where('cmp_id_cmpt', $id)->get();
        }

        return view('listCompanies', compact('data'))->with(['name' => $cmp_type[0]->cmpt_desc]);
    }

    public function update(Request $request, $id)
    {
        $data = tb_company_types::findOrFail($id);

        $data->update($request->all());

        return back()->with('message', 'Se actualizó correctamente');
    }

    public function destroy($id)
    {
        $data = tb_company_types::findOrFail($id);

        $data->delete();

        return back()->with('message', 'Se ha eliminado correctamente');
    }
}
