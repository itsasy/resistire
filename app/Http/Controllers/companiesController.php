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
    public function index($idDistrict)
    {
        return tb_companies::with('info_district')->with('info_company_type')->where('cmp_id_dst',$idDistrict)->orderBy('cmp_id_cmpt', 'DESC')->get();
    }

    public function imageCompanie($fileName)
    {
        $path = public_path() . '/images/companies/' . $fileName;
        return Response::download($path);
    }
}
