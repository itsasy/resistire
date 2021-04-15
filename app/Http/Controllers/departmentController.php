<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_province;
use App\Models\tb_district;
use App\Models\tb_departments;
use App\Models\tb_projects;


class departmentController extends Controller
{
    public function showDepartments(){
        return tb_departments::get();
    }
    public function showProvince($id){
        return tb_province::where('prv_id_dpm', $id)->get();
    }
    public function showDistrict($id){
        return tb_district::where('dst_id_prv', $id)->get();
    }
    public function showDistrictbyId($id){
        return tb_district::where('id', $id)->get();
    }
    
    public function obtenerUbicacion(){
        
        $response = \GoogleMaps::load('directions')
               ->containsLocation(-12.076,-76.994);
    
        dd( $response );  

    }
    
    //OBTIENE EL ID DEL DISTRITO
    public function getLocation($alt_latitude,$alt_longitude){
        try{
            $response = \GoogleMaps::load('directions')->containsLocation($alt_latitude,$alt_longitude);
            
            return $response;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
    //OBTIENER INFORMACION SI ESTA DENTRO DEL RANGO
    public function getLocationRank($id_project,$alt_latitude,$alt_longitude){
        try{
            $response = \GoogleMaps::load('directions')->containsLocation($alt_latitude,$alt_longitude);
           
            $projects = tb_projects::where('id',$id_project)->first();
            
            if($projects->prj_id_dst ==  $response){
                return response()->json(['type' => 'success', 'message' => "Dentro del rango"], 200);
            }else{
                return response()->json(['type' => 'success', 'message' => "Fuera del rango"], 200);
            }


        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
    //OBTIENE TODOS LOS DATOS DEL DISTRITO
    public function showDistrictbyLatLon($alt_latitude,$alt_longitude){
        try {
            //OBTENER ID DISTRITO MEDIANTE EL ENVIO DE LATITUD Y LONGITUD DE LA ALERTA
            $id_district = \GoogleMaps::load('directions')->containsLocation($alt_latitude,$alt_longitude);
            
            $district = tb_district::where('id', $id_district)->get();
            
            return  $district;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

}
