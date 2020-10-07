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
        return tb_companies::where('cmp_id_dst', $district)->where('cmp_id_cmpt', $type)->orderBy('cmp_id_cmpt', 'DESC')->get();
    }

    public function imageCompanie($fileName)
    {
        $path = public_path() . '/images/companies/' . $fileName;
        return Response::download($path);
    }
}
