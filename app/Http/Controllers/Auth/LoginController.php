<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    
    use AuthenticatesUsers;


    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            Auth::logoutOtherDevices($request->password);
            if ($request->is('api/login')) {
                return Auth::user();
            } else {
                if (Auth::user()->usr_type_id == 3) {
                    return back()->with('status', 'No tiene acceso');
                }
                $DISTRITO = Auth::user()->district->dst_name;
                $IDDISTRITO = Auth::user()->district->id;
                $PROVINCIA = Auth::user()->district->province->prv_name;


                session(['autenticacion' => Auth::user()]);
                session(['distrito' => $DISTRITO]);
                session(['id_distrito' => $IDDISTRITO]);
                session(['nom_provincia' => $PROVINCIA]);
                session(['usr_style' => Auth::user()->usr_style]);

                return redirect()->route('Mapa', ['district' => $DISTRITO, 'iddistrict' => $IDDISTRITO, 'provincia' => $PROVINCIA]);
            }
        }
        
        if ($request->is('api/login')) {
            return response()->json(['mensaje' => 'El logeo falló, intente nuevamente'], 409);
        } else {
            return back()->with('status', 'No tiene acceso');
        }
    }
    
    public function logout(Request $request) 
    {
        Session::flush();
        Auth::logout();
        
        if ($request->is('api/logout')) {
            return response()->json(['mensaje' => 'Ha salido'], 409);
        }
        
        return redirect()->route('Index');

    }

}
