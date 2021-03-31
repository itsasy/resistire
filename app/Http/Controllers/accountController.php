<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_users;
use App\Models\tb_genders;
use App\Models\tb_user_types;
use App\Mail\CorreosMail;
use Illuminate\Support\Facades\Mail;

class accountController extends Controller
{
    public function index()
    {
        return tb_users::with('district')->get();
    }

    public function store(Request $request, tb_users $users)
    {
        try {
            $users->usr_document = $request->usr_document;
            $users->usr_patname = $request->usr_patname;
            $users->usr_matname = $request->usr_matname;
            $users->usr_name = $request->usr_name;
            $users->usr_birthdate = $request->usr_birthdate;
            $users->usr_id_gnd = $request->usr_id_gnd;
            $users->usr_id_dst = $request->usr_id_dst;
            $users->usr_address = $request->usr_address;
            $users->usr_email = $request->usr_email;
            $users->usr_phone_1 = $request->usr_phone_1;
            $users->username = $request->usr_document;
            $users->usr_id_prj = $request->usr_id_prj;
            
            $pass = substr($users->usr_patname, 0, 3) . substr($request->usr_document, 0, 5);
            $users->password = bcrypt($pass);
            
            $users->usr_type_id = $request->usr_type_id;

        
            if ($users->save()) {
                
                $this->enviarCorreo($request->usr_document, $pass, $request->usr_email); // ENVIAR CORREO

            }

            return response()->json(['type' => 'success', 'message' => 'Registro completo', 'user' => $users], 200);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
     // FUNCION DE ENVIO DE CORREOS
    public function enviarCorreo($usuario, $contrasena, $correo_usuario)
    {
        Mail::to($correo_usuario)->send(new CorreosMail($usuario, $contrasena));
    }
    

    public function show($id)
    {
        try {
            $users = tb_users::with('district')->find($id);

            if ($users == null)
                throw new \Exception('Registro no encontrado');

            return $users;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $users = tb_users::find($id);

            if ($request->get('password') != null) {
                $users->password = bcrypt($request->password);
            }
            if ($request->has('usr_address')) {
                $users->usr_address = $request->usr_address;
            }
            if ($request->has('usr_id_dst')) {
                $users->usr_id_dst = $request->usr_id_dst;
            }
            if ($request->has('usr_email')) {
                $users->usr_email = $request->usr_email;
            }
            if ($request->has('usr_phone_1')) {
                $users->usr_phone_1 = $request->usr_phone_1;
            }
            if ($request->has('usr_phone_2')) {
                $users->usr_phone_2 = $request->usr_phone_2;
            }
            if ($request->has('usr_type_id')) {
                $users->usr_type_id = $request->usr_type_id;
            }
            if ($request->has('enable')) {
                $users->enable = $request->enable;
            }
            $users->save();

            return response()->json(['type' => 'success', 'message' => 'Se ha actualizado correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $users = tb_users::find($id);

            $users->delete();

            return response()->json(['type' => 'success', 'message' => 'Registro eliminado'], 200);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
    public function genders()
    {
        return tb_genders::get();
    }
    
    public function gendersbyId($id)
    {
        return tb_genders::where('id', $id)->get();
    }
    
    public function userType(){
        return tb_user_types::get();
    }
    
    public function showUserbyDocument($document)
    {
        try {
            $usr = tb_users::where('usr_document', $document)->get();

            return $usr;
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
    public function testEmail()
    {
        $this->enviarCorreo("72686920", "rau7268", "hitc242@gmail.com");
    }
    
    
}
