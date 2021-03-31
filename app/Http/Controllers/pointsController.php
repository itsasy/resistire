<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_points;
use App\Models\tb_district;
use Storage;
use File;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class pointsController extends Controller
{
    public function index()
    {
        return tb_points::with('info_district')->orderBy('atp_id_atpt','DESC')->get();
    }

    public function store(Request $request, tb_points $tb_points)
    {
        try {
            $tb_points->atp_id_usr = $request->atp_id_usr;
            $tb_points->atp_name = $request->atp_name;

            if ($request->hasFile('atp_img') && $request->file('atp_img')->isValid()) {
                $imagen = $request->file('atp_img');
                $filename = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a.') . $request->file('atp_img')->extension()));

                Storage::disk('points')->put($filename,  File::get($imagen));

                $tb_points->atp_img = $filename;
            }

            $tb_points->atp_latitude = $request->atp_latitude;
            $tb_points->atp_length = $request->atp_length;
            $tb_points->atp_address = $request->atp_address;
            $tb_points->atp_url = $request->atp_url;
            
            if($request->user_type == 1){
                $distrito = \GoogleMaps::load('directions')->containsLocation($request->atp_latitude,$request->atp_length);
                $tb_points->atp_id_dst = $distrito;
                $tb_points->atp_id_atpt = "1";

            }else{
                $tb_points->atp_id_atpt = "2";
                $tb_points->atp_id_dst = $request->atp_id_dst;
            }
            

            $tb_points->save();
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $tb_points = tb_points::where('id', $id)->first();
            if ($tb_points == null)
                throw new \Exception('No se ha encontrado');
            return $tb_points;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
    public function showPointsbyDistrict($atp_id_dst)
    {
        try {
            $tb_points = tb_points::where([['atp_id_dst', $atp_id_dst],['atp_id_atpt', 2]])->with('info_district')->get();
            
            return $tb_points;
            
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
    public function showPointsandStaticPointsbyDistrict($atp_id_dst)
    {
        try {
            $tb_points = tb_points::where([['atp_id_dst', $atp_id_dst],['atp_id_atpt', 2]])->with('info_district')->get();
            //TIPO 1  = STATIC PONITS
            $tb_points2 = tb_points::where('atp_id_atpt', 1)->with('info_district')->get();
            $tb_points_final = array_merge(json_decode($tb_points), json_decode($tb_points2));
            
            return $tb_points_final;
            
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
    public function showGeneralPoints()
    {
        try {
            
            $tb_points = tb_points::where('atp_id_atpt', 1)->with('info_district')->get();
            
            return $tb_points;
            
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $tb_points = tb_points::find($id);
            
            if ($request->has('atp_id_usr')) {
                $tb_points->atp_id_usr = $request->atp_id_usr;
            }

            if ($request->has('atp_id_dst')) {
                $tb_points->atp_id_dst  = $request->atp_id_dst;
            }
            if ($request->has('atp_id_atpt')) {
                $tb_points->atp_id_atpt = $request->atp_id_atpt;
            }
            if ($request->has('atp_name')) {
                $tb_points->atp_name  = $request->atp_name;
            }

            if ($request->hasFile('atp_img') && $request->file('atp_img')->isValid()) {
                Storage::disk('points')->delete($tb_points->img);
                $imagen = $request->file('atp_img');
                $filename = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a.') . $request->file('atp_img')->extension()));

                Storage::disk('points')->put($filename,  File::get($imagen));

                $tb_points->atp_img = $filename;
            }

            if ($request->has('atp_latitude')) {
                $tb_points->atp_latitude  = $request->atp_latitude;
            }
            if ($request->has('atp_length')) {
                $tb_points->atp_length  = $request->atp_length;
            }
            if ($request->has('atp_address')) {
                $tb_points->atp_address  = $request->atp_address;
            }
            if ($request->has('atp_url')) {
                $tb_points->atp_url = $request->atp_url;
            }
            $tb_points->save();
            return response()->json(['type' => 'success', 'message' => 'Actualización completa'], 200);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $tb_points = tb_points::find($id);
            if ($tb_points == null)
                throw new \Exception('Registro no encontrado');
            Storage::disk('points')->delete($tb_points->atp_img);
            $tb_points->delete();
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function imagePoints($fileName)
    {
        $path = public_path() . '/images/points/' . $fileName;
        return Response::download($path);
    }
    
    
}
