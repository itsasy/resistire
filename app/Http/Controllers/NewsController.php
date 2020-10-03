<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_news;
use Storage;
use File;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index()
    {
        return tb_news::orderBy('nws_date', 'desc')->with('info_district')->get();
    }

    public function store(Request $request, tb_news $nws)
    {
        try {
            $nws->nws_id_nwst = $request->nws_id_nwst;
            $nws->nws_id_dst = $request->nws_id_dst;
            $nws->nws_author = $request->nws_author;
            $nws->nws_title = $request->nws_title;
            $nws->nws_desc = $request->nws_desc;
            $nws->nws_source = $request->nws_source;
            $nws->nws_url = $request->nws_url;

            if ($request->hasFile('nws_img') && $request->file('nws_img')->isValid()) {
                $imagen = $request->file('nws_img');
                $filename = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a.') . $request->file('nws_img')->extension()));
                Storage::disk('news')->put($filename,  File::get($imagen));

                $nws->nws_img = $filename;
            }

            $nws->nws_date = Carbon::parse($request->nws_date)->format('Y-m-d h:i:s');

            $nws->save();

            return response()->json(['type' => 'success', 'message' => 'Registro completo', 'new' => $nws], 200);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $nws = tb_news::find($id);

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

            $nws = tb_news::find($id);

            if ($request->has('nws_id_nwst')) {
                $nws->nws_id_nwst = $request->nws_id_nwst;
            }
            if ($request->has('nws_id_dst')) {
                $nws->nws_id_dst = $request->nws_id_dst;
            }
            if ($request->has('nws_author')) {
                $nws->nws_author = $request->nws_author;
            }
            if ($request->has('nws_title')) {
                $nws->nws_title = $request->nws_title;
            }
            if ($request->has('nws_desc')) {
                $nws->nws_desc = $request->nws_desc;
            }
            if ($request->has('nws_source')) {
                $nws->nws_source = $request->nws_source;
            }
            if ($request->has('nws_url')) {
                $nws->nws_url = $request->nws_url;
            }
            if ($request->hasFile('nws_img') && $request->file('nws_img')->isValid()) {
                Storage::disk('news')->delete($nws->nws_img);

                $imagen = $request->file('nws_img');
                $filename = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a.') . $request->file('nws_img')->extension()));
                Storage::disk('news')->put($filename,  File::get($imagen));

                $nws->nws_img = $filename;
            }
            if ($request->has('nws_date')) {
                $nws->nws_date = Carbon::parse($request->nws_date)->format('Y-m-d h:i:s');
            }
            $nws->save();

            return response()->json(['type' => 'success', 'message' => 'Actualización completa'], 200);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $nws = tb_news::find($id);
            if ($nws == null)
                throw new \Exception('Registro no encontrado');

            Storage::disk('news')->delete($nws->nws_img);
            $nws->delete();

            return response()->json(['type' => 'success', 'message' => 'Registro eliminado'], 200);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function newsbyType($type)
    {
        try {
            $nws = tb_news::where('nws_id_nwst', $type)->with('info_district')->orderBy('nws_date', 'desc')->get();

            return $nws;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
    public function localNewsbyDistrict($nws_id_dst)
    {
        try {
            $nws = tb_news::where('nws_id_nwst', 1)->where('nws_id_dst', $nws_id_dst)->with('info_district')->orderBy('nws_date', 'desc')->get();

            return $nws;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function imageNews($fileName)
    {
        $path = public_path() . '/images/news/' . $fileName;
        return Response::download($path);
    }
}
