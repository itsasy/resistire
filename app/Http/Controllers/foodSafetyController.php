<?php

namespace App\Http\Controllers;

use App\Models\tb_foodsafety;
use App\Models\tb_foodsafety_types;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class foodSafetyController extends Controller
{
    public function index()
    {
        $data = tb_foodsafety_types::paginate(8);

        return view('typesFoodSafety', compact('data'));
    }

    public function create()
    {
        $types = tb_foodsafety_types::all();

        return view('regFoodSafety', compact('types'));
    }

    public function store(Request $request)
    {
        $user = ['fds_id_usr' => auth()->user()->id];

        $article = tb_foodsafety::create($request->all(), $user);

        if ($request->fds_img) {
            $this->save_image($request->fds_img, $article);
        }

        return redirect()->route('alimentos.index');
    }


    public function show($id)
    {

        $data = tb_foodsafety::where('fds_id_fdst', $id)->get();

        $name = tb_foodsafety_types::where('id', $id)->get();

        return view('listFoodSafety', compact('data'))->with(['name' => $name[0]->fdst_desc]);
    }


    public function edit($id)
    {
        $article = tb_foodsafety::findOrFail($id);
        $types = tb_foodsafety_types::all();

        return view('updateFoodSafety', compact('article', 'types'));
    }

    public function update(Request $request, $id)
    {
        $article = tb_foodsafety::findOrFail($id);

        if ($article->fds_img) {
            Storage::delete('foodSafety/' . $article->fds_img);
        }

        $article->update($request->all());

        if ($request->fds_img) {
            $this->save_image($request->fds_img, $article);
        }

        $article->save();

        return redirect()->route('alimentos.index');
    }

    public function destroy($id)
    {
        $data = tb_foodsafety::findOrFail($id);

        if ($data->fds_img) {
            Storage::delete('foodSafety/' . $data->fds_img);
        }
        $data->delete();

        return back()->with(['message' => 'Se ha eliminado correctamente']);
    }

    public function save_image($image, $model)
    {


        $name = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a.') . $image->extension()));

        $image->storeAs('foodSafety', $name);

        //$url = Storage::url('foodSafety', $name);

        $model->update(['fds_img' => $name]);

        return $name;
    }
}
