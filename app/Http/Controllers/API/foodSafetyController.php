<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\foodSafetyCollection;
use App\Http\Resources\foodSafetyResource;
use App\Models\tb_foodsafety;
use Illuminate\Support\Facades\Storage;

class foodSafetyController extends Controller
{
    public function index()
    {
        $articles = tb_foodsafety::all();

        return foodSafetyCollection::make($articles);
    }

    public function store(Request $request)
    {
        $article = tb_foodsafety::create($request->all());

        if ($request->fds_img) {
            $this->save_image($request->fds_img, $article);
        }

        return foodSafetyResource::make($article);
    }

    public function show($id)
    {
        $article = tb_foodsafety::findOrFail($id);
        return foodSafetyResource::make($article);
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

        return foodSafetyResource::make($article);

    }


    public function destroy($id)
    {
        $article = tb_foodsafety::findOrFail($id);

        if ($article->fds_img) {
            Storage::delete('public/foodSafety', $article->fds_img);
        }

        $status = $article->delete();

        return $status ? 'Eliminado correctamente' : null;
    }

    public function save_image($image, $model) : void
    {
        $name = $image->getClientOriginalName();

        $image->storeAs('foodSafety', $name);

        $model->update(['fds_img' => $name]);

    }
}
