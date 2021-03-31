<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\tb_alerts;
use App\Models\tb_alert_types;
use App\Models\tb_district;
use App\Events\NuevaAlerta;
use Storage;
use Carbon\Carbon;
use App\Models\tb_user_types;

class alertsController extends Controller
{
    
    
    
    public function index()
    {
        return tb_alerts::with('info_user')->with('info_district')->orderBy('alt_date', 'DESC')->get();
    }

    public function store(Request $request, tb_alerts $alerts)
    {
        try {
            date_default_timezone_set('America/Lima');
            $date = date("Y") . '-' . date("m") . '-' . date("d") . ' ' . (date('H')) . ':' . date('i') . ':' . date('s');
            
            //OBTENER DISTRITO MEDIANTE EL ENVIO DE LATITUD Y LONGITUD DE LA ALERTA
            $distrito = \GoogleMaps::load('directions')->containsLocation($request->alt_latitude,$request->alt_longitude);

            
            $alerts->alt_id_usr = $request->alt_id_usr;
            $alerts->alt_id_dst = $distrito;
            $alerts->alt_id_altt = $request->alt_id_altt;
            $alerts->alt_address = $request->alt_address;
            $alerts->alt_latitude = $request->alt_latitude;
            $alerts->alt_longitude = $request->alt_longitude;
            $alerts->alt_id_prj = $request->alt_id_prj;
            $alerts->alt_date = $date;

            $alerts->save();
            broadcast(new NuevaAlerta("alertaInsertada")); // Señal Alertas

            return response()->json(['type' => 'success', 'message' => 'Registro completo', 'alert' => $alerts], 200);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $alerts =  tb_alerts::with('info_district')->orderBy('alt_date', 'DESC')->find($id);

            if ($alerts == null)
                throw new \Exception('No se ha encontrado');

            return $alerts;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
    public function update(Request $request, $id)
    {
        try {
            $alerts = tb_alerts::find($id);

            if ($request->has('alt_comentary')) {
                $alerts->alt_comentary  = $request->alt_comentary;
            }

            if ($request->hasFile('alt_img') && $request->file('alt_img')->isValid()) {
                $imagen = $request->file('alt_img');
                $filename = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a.') . $request->file('alt_img')->extension()));
                Storage::disk('alerts')->put($filename,  File::get($imagen));
                $alerts->alt_img = $filename;
            }

            $alerts->alt_attended = 0;
            $alerts->save();
            broadcast(new NuevaAlerta("cambio-registrado"));

            return response()->json(['type' => 'success', 'message' => 'Actualización completa'], 200);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $alerts = tb_alerts::find($id);
            if ($alerts == null) {
                throw new Exception('Registro no encontrado');
            }
            Storage::disk('alerts')->delete($alerts->alt_img);
            $alerts->delete();
            return response()->json(['type' => 'success', 'message' => 'Registro eliminado'], 200);
        } catch (Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function showAlertsUser($alt_id_usr)
    {
        try {
            $alerts = tb_alerts::where('alt_id_usr', $alt_id_usr)->orderBy('alt_date', 'DESC')->with('info_district')->get();

            return $alerts;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
    public function showAlertsTypesbyUser($alt_id_altt,$alt_id_usr)
    {
        try {
            $alerts = tb_alerts::where('alt_id_altt',$alt_id_altt)->where('alt_id_usr', $alt_id_usr)->with('info_district')->orderBy('alt_date', 'DESC')->get();

            return $alerts;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function showAlertsDistrict($alt_id_dst)
    {
        try {
            
            $alerts = tb_alerts::where('alt_id_dst', $alt_id_dst)->orderBy('alt_date', 'DESC')->get();

            return $alerts;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
    public function typeAlerts(){
        return tb_alert_types::get();
    }
    
    public function testComunication() {
        broadcast(new NuevaAlerta("mensaje"));
        return response()->json(['type' => 'success', 'message' => 'enviado'], 200); 
    }
    
    public function unattendedAlert($idDistrict, $idproject)
    {
        
        return tb_alerts::where('alt_id_dst' , $idDistrict)->where('alt_attended', '0')->where('alt_id_prj', $idproject)->with('info_user')->get();
    }
    
    public function unattendedAlertNew($idDistrict, $idproject, $idType)
    {
        $idAlert = tb_user_types::find($idType)->usrt_id_altt;
        
        return tb_alerts::where('alt_id_dst' , $idDistrict)->where('alt_attended', '0')->where('alt_id_prj', $idproject)->where('alt_id_altt', $idAlert)->with('info_user')->get();
    }
    
    public function updateAlert($id)
    {
        $alerts = tb_alerts::find($id);
        $alerts->alt_attended = 1;
        $alerts->save();
        //broadcast(new NuevaAlerta("correcto"));
        
        return response()->json($alerts, 200);
        
    }
    
    public function imageAlert($fileName){
        $path = public_path() . '/images/alerts/' . $fileName;
        return Response::download($path);
    }
    
    
}
