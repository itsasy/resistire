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

        if ($this->fecha_inicio == Carbon::now()->format('Y-m-d 00:00:00')) {
            $fecha_inicio = '2000-01-01 00:00:00';
        } else {
            $fecha_inicio = $this->fecha_inicio;
        }


        $userType = session('autenticacion')->usr_type_id;

        if ($userType != 1) {
            $ALERTAS = $this->alertsBy($userType)->whereBetween('alt_date', [$fecha_inicio, $this->fecha_fin])->get();
        } else {
            $ALERTAS = tb_alerts::whereBetween('alt_date', [$fecha_inicio, $this->fecha_fin])->get();
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

    /**
     * @param $userType
     * @return tb_alerts[]|\Illuminate\Database\Eloquent\Collection
     */
    public function alertsBy($userType)
    {
        switch ($userType) {
            case 2:
                $alerList = tb_alerts::alertsByProject()->alertsByDist();
                break;
            case 4:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByType(1);
                break;
            case 5:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByType(2);
                break;
            case 6:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByType(3);
                break;
            case 7:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByType(4);
                break;
            case 8:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByType(5);
                break;
            case 9:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByType(6);
                break;
            case 10:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByType(7);
                break;
            case 11:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByType(8);
                break;
            case 12:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByType(9);
                break;
            case 13:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByType(10);
                break;
            case 14:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByType(11);
                break;
            case 15:
                $alerList = tb_alerts::alertsByProject()->alertsByDist()->alertsByType(12);
                break;
        }
        return $alerList;
    }
}
