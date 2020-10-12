<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\foodSafetyCollection;
use App\Http\Resources\foodSafetyResource;
use App\Models\tb_foodsafety;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class foodSafetyController extends Controller
{
    public function index()
    {
        $articles = tb_foodsafety::all();

        return foodSafetyCollection::make($articles);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->fds_img) {
            $data['fds_img'] = $this->save_image($request->fds_img, $data);
        }

        $data['slug'] = $this->slug($request->fds_title);

        /*  $image = $request->fds_img ? $request->fds_img->storeAs('foodSafety', $request->fds_img->getClientOriginalName()) : null;

        $data['fds_img'] = $image;
        */
        $article = tb_foodsafety::create($data);

        return foodSafetyResource::make($article);
    }

    public function show(tb_foodsafety $foodsafety)
    {
        return foodSafetyResource::make($foodsafety);
    }


    public function update(Request $request, tb_foodsafety $foodsafety)
    {
        $data = $request->all();

        $data['slug'] = $this->slug($request->fds_title);

        if ($request->fds_img) {
            Storage::delete('foodSafety/' . $foodsafety->fds_img);
            $data['fds_img'] = $this->save_image($request->fds_img, $data);
        }

        $foodsafety->update($data);

        return foodSafetyResource::make($foodsafety);
    }


    public function destroy(tb_foodsafety $foodsafety)
    {
        if ($foodsafety->fds_img) {
            Storage::delete('public/foodSafety', $foodsafety->fds_img);
        }

        $status = $foodsafety->delete();

        return $status ? 'Eliminado correctamente' : null;
    }

    public function slug($title)
    {
        $slug = Str::slug($title);
        return $slug;
    }

    public function save_image($image)
    {
        /* $name = $image->getClientOriginalName();
        $image->storeAs('foodSafety', $name);
        $data['fds_img'] = $name; */

        $name = $image->getClientOriginalName();
        return $image->storeAs('foodSafety', $name);
    }
}
