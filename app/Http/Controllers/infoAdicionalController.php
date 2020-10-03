<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_infoadi;
use Storage;
use File;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class infoAdicionalController extends Controller
{
    public function index()
    {
        return tb_infoadi::orderBy('adi_date', 'desc')->get();
    }

    public function store(Request $request, tb_infoadi $info)
    {
        try {
            $info->adi_id_usr = $request->adi_id_usr;
            $info->adi_id_adit = $request->adi_id_adit;
            $info->adi_title = $request->adi_title;
            $info->adi_desc = $request->adi_desc;
            $info->adi_source = $request->adi_source;
            $info->adi_url = $request->adi_url;
            $info->adi_youtube = $request->adi_youtube;
            $info->adi_instagram = $request->adi_instagram;
            $info->adi_facebook = $request->adi_facebook;

            $info->adi_date = Carbon::parse($request->adi_date)->format('Y-m-d h:i:s');

            if ($request->hasFile('adi_img') && $request->file('adi_img')->isValid()) {
                $imagen = $request->file('adi_img');
                $filename = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a.') . $request->file('adi_img')->extension()));
                Storage::disk('infoAdicional')->put($filename,  File::get($imagen));
                $info->adi_img = $filename;
            }

            $info->save();

            return response()->json(['type' => 'success', 'message' => 'Registro completo', 'infoAdicional' => $info], 200);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $nws = tb_infoadi::find($id);

            if ($nws == null)
                throw new \Exception('Registro no encontrado');

            return $nws;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $info = tb_infoadi::find($id);

            if ($request->has('adi_id_usr')) {
                $info->adi_id_usr = $request->adi_id_usr;
            }
            if ($request->has('adi_id_adit')) {
                $info->adi_id_adit = $request->adi_id_adit;
            }
            if ($request->has('adi_title')) {
                $info->adi_title = $request->adi_title;
            }
            if ($request->has('adi_desc')) {
                $info->adi_desc = $request->adi_desc;
            }
            if ($request->has('adi_source')) {
                $info->adi_source = $request->adi_source;
            }
            if ($request->has('adi_url')) {
                $info->adi_url = $request->adi_url;
            }
            if ($request->has('adi_youtube')) {
                $info->adi_youtube = $request->adi_youtube;
            }
            if ($request->has('adi_instagram')) {
                $info->adi_instagram = $request->adi_instagram;
            }
            if ($request->has('adi_instagram')) {
                $info->adi_facebook = $request->adi_facebook;
            }
            if ($request->has('adi_date')) {
                $info->nws_date = Carbon::parse($request->adi_date)->format('Y-m-d h:i:s');
            }
            if ($request->hasFile('adi_img') && $request->file('adi_img')->isValid()) {
                Storage::disk('infoAdicional')->delete($info->adi_img);
                $imagen = $request->file('adi_img');
                $filename = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a.') . $request->file('adi_img')->extension()));
                Storage::disk('infoAdicional')->put($filename,  File::get($imagen));
                $info->adi_img = $filename;
            }
            
            $info->save();

            return response()->json(['type' => 'success', 'message' => 'Actualización completa'], 200);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $info = tb_infoadi::find($id);
            if ($info == null)
                throw new \Exception('Registro no encontrado');

            Storage::disk('infoAdicional')->delete($info->adi_img);
            $info->delete();

            return response()->json(['type' => 'success', 'message' => 'Registro eliminado'], 200);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function infobyType($type)
    {
        try {
            $info = tb_infoadi::where('adi_id_adit', $type)->orderBy('adi_date', 'desc')->get();

            return $info;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function imageInfo($fileName)
    {
        $path = public_path() . '/images/infoAdicional/' . $fileName;
        return Response::download($path);
    }
}
