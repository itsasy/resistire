<?php

namespace App\Http\Controllers;

use App\Models\tb_alerts;
use App\Models\tb_users;
use App\Models\tb_alert_types;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;
class ExcelController implements FromView
{

    use Exportable;

    public function __construct($fecha_inicio, $fecha_fin)
    {
        $this->fecha_inicio = $fecha_inicio . ' 00:00:00';
        $this->fecha_fin = $fecha_fin . ' 23:59:59';
    }

    public function view(): View
    {
        if($this->fecha_inicio == Carbon::now()->format('Y-m-d 00:00:00')){
            $fecha_inicio = '2000-01-01 00:00:00';
        }else{
            $fecha_inicio = $this->fecha_inicio;
        }
        
        if (session('autenticacion')->usr_type_id == 2) {
            $ALERTAS = tb_alerts::whereBetween('alt_date', [$fecha_inicio, $this->fecha_fin])->where('alt_id_dst', session('autenticacion')->usr_id_dst)->get();
        }else{
            $ALERTAS =tb_alerts::whereBetween('alt_date', [$fecha_inicio, $this->fecha_fin])->get();
        }
        
        foreach ($ALERTAS as $alertas) {
            $alertas->usuario = tb_users::where('id', $alertas->alt_id_usr)->get();
            $alertas->municipal = tb_alert_types::where('id', $alertas->alt_id_altt)->get();
        }
        $exc = view('excel', [
            'data' => $ALERTAS
        ]);
        return $exc;
    }
}
