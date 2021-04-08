<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_companies;
use App\Models\tb_district;
use Storage;
use File;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class companiesController extends Controller
{
    public function index()
    {
        return tb_companies::orderBy('cmp_id_cmpt', 'desc')->with('info_district')->with('info_company_type')->get();
    }
    
    public function show($id)
    {
        try {
            $cmp = tb_companies::with('info_district')->with('info_company_type')->where('id',$id)->get();

            if ($cmp == null)
                throw new \Exception('Registro no encontrado');

            return $cmp;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
    public function companies_by_district($district)
    {
        return tb_companies::with('info_district')->with('info_company_type')->where('cmp_id_dst',$district)->orderBy('cmp_id_cmpt', 'DESC')->get();
    }

    public function companies_by_district_and_type($district, $type)
    {
        return tb_companies::with('info_district')->with('info_company_type')->where('cmp_id_dst', $district)->where('cmp_id_cmpt', $type)->orderBy('cmp_id_cmpt', 'DESC')->get();
    }

    public function imageCompanie($fileName)
    {
        $path = public_path() . '/images/companies/' . $fileName;
        return Response::download($path);
    }
    
    /*NEW FUNCTIONS V1_1*/
    
    public function points_project_district($cmp_id_prj, $cmp_id_dst)
    {
        try {
            $tb_companies = tb_companies::where([['cmp_id_prj', $cmp_id_prj], ['cmp_id_dst', $cmp_id_dst]])->with('info_district')->with('info_company_type')->orderBy('cmp_id_cmpt', 'DESC')->get();

            return $tb_companies;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
    public function points_project_district_type($cmp_id_prj, $cmp_id_dst, $cmp_id_cmpt)
    {
        try {
            $tb_companies = tb_companies::where([['cmp_id_prj', $cmp_id_prj], ['cmp_id_dst', $cmp_id_dst], ['cmp_id_cmpt', $cmp_id_cmpt]])->with('info_district')->with('info_company_type')->orderBy('cmp_id_cmpt', 'DESC')->get();

            return $tb_companies;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
