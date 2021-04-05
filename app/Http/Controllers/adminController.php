<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\tb_news;
use App\Models\tb_points;
use App\Models\tb_users;
use App\Models\tb_alerts;
use App\Models\tb_infoadi;
use App\Models\tb_companies;
use App\Models\tb_district;
use App\Models\tb_company_types;
use Storage;
use File;
use Carbon\Carbon;
use DB;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index()
    {
        if (session()->exists('autenticacion')) {
            return redirect()->route('Mapa', [session('distrito'), session('id_distrito'), session('nom_provincia')]);
        }
        return view('login');
    }

    public function Mapa($district, $iddistrict, $provincia)
    {
        $usr_type_id = session('usr_type_id');
        $usr_id_prj = session('usr_id_prj');

        return view('map', compact('district', 'iddistrict', 'provincia', 'usr_type_id', 'usr_id_prj'));
    }

    public function news($seccion)
    {
        $noticias = tb_news::orderBy('nws_date', 'desc')->get();

        return view('blog', compact('noticias'));
    }

    public function regNews()
    {
        $distrito = session('distrito');
        return view('regNoticia', compact('distrito'));
    }

    public function saveNews(Request $request, tb_news $nws)
    {
        try {
            $nws->nws_id_usr = session('autenticacion')->id;
            $nws->nws_id_nwst = $request->nws_type;
            $nws->nws_id_dst = session('autenticacion')->usr_id_dst;
            $nws->nws_author = $request->author;
            $nws->nws_title = $request->title;
            $nws->nws_desc = $request->description;
            $nws->nws_source = $request->source;
            $nws->nws_url = $request->url;
            $nws->nws_date = Carbon::parse($request->nws_date . ' ' . $request->hora)->format('Y-m-d h:i:s');

            if ($request->file('nws_image')->isValid()) {
                $imagen = $request->file('nws_image');
                $filename = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a.') . $request->file('nws_image')->extension()));
                Storage::disk('news')->put($filename, File::get($imagen));
                $nws->nws_img = $filename;
            }

            $nws->save();

            if ($request->tipo == 'locales') {
                return redirect()->route('local_news');
            }

            return redirect()->route('noticias', ['seccion' => $request->tipo]);
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function deleteNews($id)
    {
        try {
            $nws = tb_news::find($id);
            Storage::disk('news')->delete($nws->nws_img);
            $nws->delete();
            return redirect()->route('noticias', ['seccion' => $request->tipo]);
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function updateNews($id)
    {
        $noticias = tb_news::where('id', $id)->first();
        return view('updateNoticia', compact('noticias'));
    }

    public function saveUpdateNews(Request $request)
    {
        try {
            $nws = tb_news::where('id', $request->id)->first();

            $nws->nws_id_nwst = $request->nws_type;
            $nws->nws_author = $request->author;
            $nws->nws_title = $request->title;
            $nws->nws_desc = $request->description;
            $nws->nws_source = $request->source;
            $nws->nws_url = $request->url;

            $nws->nws_date = Carbon::parse($request->nws_date . ' ' . $request->hora)->format('Y-m-d h:i:s');

            if ($request->hasFile('nws_image') && $request->file('nws_image')->isValid()) {
                Storage::disk('news')->delete($nws->nws_img);
                $imagen = $request->file('nws_image');
                $filename = str_replace(' ', '', (Carbon::parse()->format('m-d-Y_h-m-s_a.') . $request->file('nws_image')->extension()));
                Storage::disk('news')->put($filename, File::get($imagen));
                $nws->nws_img = $filename;
            }

            $nws->save();

            if ($request->tipo == 'locales') {
                return redirect()->route('local_news');
            }

            return redirect()->route('noticias', ['seccion' => $request->tipo]);
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function regInfo()
    {
        return view('regInfoAdicional');
    }

    public function saveInfo(Request $request, tb_infoadi $info)
    {
        try {
            $info->adi_id_usr = session('autenticacion')->id;
            $info->adi_id_adit = $request->adi_id_adit;
            $info->adi_title = $request->adi_title;
            $info->adi_desc = $request->adi_desc;
            $info->adi_source = $request->adi_source;
            $info->adi_url = $request->adi_url;
            $info->adi_youtube = $request->adi_youtube;
            $info->adi_instagram = $request->adi_instagram;
            $info->adi_facebook = $request->adi_facebook;

            $info->adi_date = Carbon::parse($request->adi_date . ' ' . $request->hora)->format('Y-m-d h:i:s');

            if ($request->file('adi_img')->isValid()) {
                $imagen = $request->file('adi_img');
                $filename = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a.') . $request->file('adi_img')->extension()));
                Storage::disk('infoAdicional')->put($filename, File::get($imagen));
                $info->adi_img = $filename;
            }

            $info->save();

            return redirect()->route('noticias', ['seccion' => 'adicional']);
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function deleteInfo($id)
    {
        try {
            $info = tb_infoadi::find($id);
            Storage::disk('infoAdicional')->delete($info->adi_img);
            $info->delete();
            return redirect()->route('noticias', ['seccion' => 'adicional']);
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function updateInfo($id)
    {
        $info = tb_infoadi::where('id', $id)->first();
        return view('updateInfoAdicional', compact('info'));
    }

    public function saveUpdateInfo(Request $request)
    {
        try {
            $info = tb_infoadi::where('id', $request->id)->first();

            $info->adi_id_adit = $request->adi_id_adit;
            $info->adi_title = $request->adi_title;
            $info->adi_desc = $request->adi_desc;
            $info->adi_source = $request->adi_source;
            $info->adi_url = $request->adi_url;
            $info->adi_youtube = $request->adi_youtube;
            $info->adi_instagram = $request->adi_instagram;
            $info->adi_facebook = $request->adi_facebook;

            $info->adi_date = Carbon::parse($request->adi_date . ' ' . $request->hora)->format('Y-m-d h:i:s');

            if ($request->hasFile('adi_img') && $request->file('adi_img')->isValid()) {
                Storage::disk('infoAdicional')->delete($info->adi_img);
                $imagen = $request->file('adi_img');
                $filename = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a.') . $request->file('adi_img')->extension()));
                Storage::disk('infoAdicional')->put($filename, File::get($imagen));
                $info->adi_img = $filename;
            }

            $info->save();
            return redirect()->route('noticias', ['seccion' => 'adicional']);
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function regPoint()
    {
        $district = session('distrito');
        return view('regPoint', compact('district'));
    }

    public function savePoint(Request $request, tb_points $tb_points)
    {
        try {
            $tb_points->atp_id_usr = session('autenticacion')->id;
            $tb_points->atp_name = $request->name_place;

            if ($request->hasFile('img') && $request->file('img')->isValid()) {
                $imagen = $request->file('img');
                $filename = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a.') . $request->file('img')->extension()));
                Storage::disk('points')->put($filename, File::get($imagen));

                $tb_points->atp_img = $filename;
            }
            $tb_points->atp_url = $request->atp_url;
            $tb_points->atp_latitude = $request->latitude_place;
            $tb_points->atp_length = $request->length_place;
            $tb_points->atp_address = $request->address_place;

            if (session('autenticacion')->usr_type_id == 1) {
                $distrito = \GoogleMaps::load('directions')->containsLocation($request->latitude_place, $request->length_place);
                $tb_points->atp_id_dst = $distrito;
                $tb_points->atp_id_atpt = "1";
            } else {
                $tb_points->atp_id_dst = session('autenticacion')->usr_id_dst;
                $tb_points->atp_id_atpt = "2";
            }

            $tb_points->save();

            return redirect()->route('public_institutions');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function deletePoint($id)
    {
        try {
            $tb_points = tb_points::find($id);
            if ($tb_points == null)
                throw new \Exception('Registro no encontrado');
            Storage::disk('points')->delete($tb_points->atp_img);
            $tb_points->delete();

            return redirect()->route('public_institutions');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function updatePoint(Request $request, $id)
    {
        $point = tb_points::where('id', $id)->first();
        $district = session('distrito');
        return view('updatePoint', compact('point', 'district'));
    }

    public function saveUpdatePoint(Request $request)
    {
        try {

            $tb_points = tb_points::where('id', $request->id)->first();

            $tb_points->atp_name = $request->name_place;

            if ($request->hasFile('img') && $request->file('img')->isValid()) {
                Storage::disk('points')->delete($tb_points->img);
                $imagen = $request->file('img');
                $filename = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a.') . $request->file('img')->extension()));
                Storage::disk('points')->put($filename, File::get($imagen));

                $tb_points->atp_img = $filename;
            }
            $tb_points->atp_url = $request->atp_url;

            $tb_points->atp_latitude = $request->latitude_place;
            $tb_points->atp_length = $request->length_place;
            $tb_points->atp_address = $request->address_place;

            $tb_points->save();

            return redirect()->route('public_institutions');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function usersList()
    {
        if (auth()->user()->usr_type_id == 1) {
            $list = tb_users::orderby('created_at', 'desc')->Paginate(15);
        } else {
            $list = tb_users::usersByTypeProject()
                ->usersByDistrict()
                ->orderby('created_at', 'desc')
                ->Paginate(15);
        }
        return view('usersList', compact('list'));
    }

    /*public function editUsers($id)
    {
        $usuario = tb_users::find($id);
        return view('editUsers', compact('usuario'));
    }*/

    public function banUser($id)
    {
        $user = tb_users::find($id);
        if ($user->usr_enable == 0) {
            $user->usr_enable = 1;
            $user->save();
        } else {
            $user->usr_enable = 0;
            $user->save();
        }

        return redirect()->back();
    }

    public function alertList()
    {
        $userType = auth()->user()->usr_type_id;

        switch ($userType) {
            case 1:
                $list = tb_alerts::Paginate(15);
                break;
            case 2:
                $alerList = tb_alerts::alertsByProject()->alertsByDist();
                break;
            case 4:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByProject(1);
                break;
            case 5:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByProject(2);
                break;
            case 6:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByProject(3);
                break;
            case 7:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByProject(4);
                break;
            case 8:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByProject(5);
                break;
            case 9:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByProject(6);
                break;
            case 10:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByProject(7);
                break;
            case 11:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByProject(8);
                break;
            case 12:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByProject(9);
                break;
            case 13:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByProject(10);
                break;
            case 14:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByProject(11);
                break;
            case 15:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByProject(12);
                break;
        }

        if ($userType != 1) {
            $list = $alerList->orderby('alt_date', 'desc')->Paginate(15);
        }

        return view('alertList', compact('list'));
    }

    public function deleteAlert($id)
    {
        try {
            $alert = tb_alerts::find($id);
            if ($alert == null)
                throw new \Exception('Registro no encontrado');

            Storage::disk('alerts')->delete($alert->alt_img);
            $alert->delete();

            return redirect()->route('alertList');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function Excel(Request $request)
    {
        date_default_timezone_set('America/Lima');
        $filename = 'Excel_' . date("d") . '-' . date("m") . '-' . date("Y") . ' ' . (date('H')) . ':' . date('i') . ':' . date('s') . '.xlsx';
        $inicio = Carbon::parse($request->inicio)->format('Y-m-d');
        $fin = Carbon::parse($request->fin)->format('Y-m-d');

        return Excel::download(new ExcelController($inicio, $fin), $filename);
    }

    /* Estadisticas */

    public function mostrarEstadisticas()
    {
        $contador = tb_alerts::selectRaw("count(*) as total, alt_id_dst")->groupBy('alt_id_dst')->orderBy('total', 'desc')->with('info_district')->get();

        return view('estadisticas', compact('contador'));
    }

    public function obtenerNroAlertasPorFecha()
    {
        $listaAlertas = tb_alerts::where('alt_id_dst', [session('autenticacion')->usr_id_dst])->orderby('alt_date', 'desc');
        return $listaAlertas;
    }


    /* COMPANIES*/

    public function listCompanies()
    {
        if (session()->exists('autenticacion')) {
            return redirect()->route('MapAsociates', [session('distrito'), session('id_distrito'), session('nom_provincia')]);
        }
    }

    public function MapaAsociates($district, $iddistrict, $provincia)
    {
        return view('mapAsociates', compact('district', 'iddistrict', 'provincia'));
    }

    public function regCompanies()
    {
        $categories = tb_company_types::pluck('cmpt_desc', 'id');

        return view('regCompanies', compact('categories'));
    }

    public function saveCompanies(Request $request, tb_companies $tb_companies)
    {
        try {
            $tb_companies->cmp_id_usr = session('autenticacion')->id;
            $tb_companies->cmp_id_dst = session('autenticacion')->usr_id_dst;
            $tb_companies->cmp_id_cmpt = $request->cmp_id_cmpt;
            $tb_companies->cmp_name = $request->cmp_name;

            if ($request->file('cmp_img')->isValid()) {
                $imagen = $request->file('cmp_img');
                $filename = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a') . "." . $request->file('cmp_img')->extension()));
                Storage::disk('companies')->put($filename, File::get($imagen));
                $tb_companies->cmp_img = $filename;
            }

            $tb_companies->cmp_latitude = $request->latitude_place;
            $tb_companies->cmp_longitude = $request->length_place;
            $tb_companies->cmp_address = $request->address_place;
            $tb_companies->cmp_url = $request->cmp_url;
            $tb_companies->cmp_instagram = $request->cmp_instagram;
            $tb_companies->cmp_facebook = $request->cmp_facebook;
            $tb_companies->cmp_state = 1;

            $tb_companies->save();
            return redirect()->route('show_asociate', ['id' => $request->cmp_id_cmpt]);

            // return redirect()->route('noticias', ['seccion' => 'companies']);
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function updateCompanies($id)
    {
        $companie = tb_companies::where('id', $id)->first();

        return view('updateCompanies', compact('companie'));
    }

    public function saveUpdateCompanies(Request $request)
    {
        try {
            $tb_companies = tb_companies::where('id', $request->id)->first();

            $tb_companies->cmp_id_cmpt = $request->cmp_id_cmpt;
            $tb_companies->cmp_name = $request->cmp_name;

            if ($request->hasFile('cmp_img') && $request->file('cmp_img')->isValid()) {
                Storage::disk('companies')->delete($tb_companies->cmp_img);
                $imagen = $request->file('cmp_img');
                $filename = str_replace(' ', '', (Carbon::parse()->format('d-m-Y_h-m-s_a') . $request->file('cmp_img')->extension()));
                Storage::disk('companies')->put($filename, File::get($imagen));
                $tb_companies->cmp_img = $filename;
            }

            $tb_companies->cmp_latitude = $request->cmp_latitude;
            $tb_companies->cmp_longitude = $request->cmp_longitude;
            $tb_companies->cmp_address = $request->address_place;
            $tb_companies->cmp_url = $request->cmp_url;
            $tb_companies->cmp_instagram = $request->cmp_instagram;
            $tb_companies->cmp_facebook = $request->cmp_facebook;


            $tb_companies->save();

            return redirect()->route('show_asociate', ['id' => $request->cmp_id_cmpt]);
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function deleteCompanies($id)
    {
        try {
            $tb_companies = tb_companies::find($id);
            if ($tb_companies == null)
                throw new \Exception('Registro no encontrado');

            Storage::disk('companies')->delete($tb_companies->cmp_img);
            $tb_companies->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function local_news()
    {
        $name = tb_district::where('id', auth()->user()->usr_id_dst)->pluck('dst_name')[0];

        $noticias = tb_news::where('nws_id_dst', auth()->user()->usr_id_dst)->where('nws_id_nwst', 1)->orderBy('nws_date', 'desc')->get();


        return view('noticias', compact('name', 'noticias'));
    }

    public function public_institutions()
    {
        $name = tb_district::where('id', auth()->user()->usr_id_dst)
            ->pluck('dst_name')[0];

        if (auth()->user()->usr_type_id != 1) {
            $puntos = tb_points::institutionsByProject()
                ->institutionsByDistrict()->get();
        }else{
            $puntos = tb_points::all();
        }

        return view('public_institutions', compact('name', 'puntos'));
    }

    public function banCompanies($id)
    {
        $companie = tb_companies::find($id);
        if ($companie->cmp_state == 0) {
            $companie->cmp_state = 1;
            $companie->save();
        } else {
            $companie->cmp_state = 0;
            $companie->save();
        }

        return redirect()->back();
    }

    public function toChart()
    {
        if (session('autenticacion')->usr_type_id == 2) {
            return tb_alerts::selectRaw("date_format(`alt_date`, '%m') as mes,
        date_format(`alt_date`, '%Y') as año
        ,count(*) as total,
        count(case when alt_id_altt = 1 then 1 end) as Serenazgo,
        count(case when alt_id_altt = 2 then 1 end) as Ambulancia,
        count(case when alt_id_altt = 3 then 1 end) as Bomberos,
        count(case when alt_id_altt = 4 then 1 end) as Fiscalización,
        count(case when alt_id_altt = 5 then 1 end) as Mujer")->groupBy('año', 'mes')->where('alt_id_dst', [session('autenticacion')->usr_id_dst])->orderBy(db::raw('año desc, mes'), 'desc')->take(12)->get();
        } else {
            return tb_alerts::selectRaw("date_format(`alt_date`, '%m') as mes,
        date_format(`alt_date`, '%Y') as año
        ,count(*) as total,
        count(case when alt_id_altt = 1 then 1 end) as Serenazgo,
        count(case when alt_id_altt = 2 then 1 end) as Ambulancia,
        count(case when alt_id_altt = 3 then 1 end) as Bomberos,
        count(case when alt_id_altt = 4 then 1 end) as Fiscalización,
        count(case when alt_id_altt = 5 then 1 end) as Mujer")->groupBy('año', 'mes')->orderBy(db::raw('año desc, mes'), 'desc')->take(12)->get();
        }
    }
}
