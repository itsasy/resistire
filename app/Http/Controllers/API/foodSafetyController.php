<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tb_foodsafety;
use Illuminate\Support\Facades\Storage;

class foodSafetyController extends Controller
{
    public function index()
    {
        return tb_foodsafety::all();
    }

    public function store(Request $request)
    {
        $response = tb_foodsafety::create($request->all());

        if ($request->fds_img) {
            $url_img = $this->save_image($request->fds_img, $table);
        }

        return response([
            'type' => 'success',
            'message' => 'Se ha registrado correctamente',
            'data' => $response,
            'img' => $url_img ? url('storage/foodSafety/' . $name) : null
        ], 200);
    }

    public function show($id)
    {
        $data = tb_foodsafety::findOrFail($id);

        return response([
            'data' => $data,
            'img' => $data->fds_img ? url('storage/foodSafety/' . $data->fds_img) : null
        ], 200);
    }


    public function update(Request $request, $id)
    {
        $article = tb_foodsafety::findOrFail($id);

        if ($article->fds_img) {
            Storage::delete('foodSafety/' . $article->fds_img);
        }

        $article->update($request->all());

        if ($request->fds_img) {
            $img = $this->save_image($request->fds_img, $article);
        }

        $article->save();

        return response([
            'type' => 'success',
            'message' => 'Se ha actualizado correctamente',
            'data' => $response,
            'img' => $img ? url('storage/foodSafety/' . $img)  : null
        ], 200);
    }


    public function destroy($id)
    {
        $data = tb_foodsafety::findOrFail($id);

        if ($data->fds_img) {
            Storage::delete('public/foodSafety', $data->fds_img);
        }

        $status = $data->delete();

        return response([
            'message' => $status ? 'Eliminado correctamente' : null
        ]);
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
