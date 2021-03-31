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
        
        if ($request->is('api/login')) {
            
            if (Auth::attempt(['username'=> $request->username, 'password' => $request->password, 'usr_id_prj' => $request->usr_id_prj])) {
            
                Auth::logoutOtherDevices($request->password);
        
                if (Auth::user()->usr_type_id == 3) {
                    return Auth::user();
                }
                
                return response()->json(['mensaje' => 'El logeo falló, intente nuevamente'], 409);
            }
                
        } else {
            
            if (Auth::attempt(['username'=> $request->username, 'password' => $request->password])) {
            
                Auth::logoutOtherDevices($request->password);
        
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
                session(['usr_type_id' => Auth::user()->usr_type_id]);
                session(['usr_id_prj' => Auth::user()->usr_id_prj]);
                
                return redirect()->route('Mapa', ['district' => $DISTRITO, 'iddistrict' => $IDDISTRITO, 'provincia' => $PROVINCIA]);
            }
            
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
