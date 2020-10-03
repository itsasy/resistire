<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use App\Models\tb_users;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciales inválidas'], 400);
            }
            if (!$user = JWTAuth::user()) {
                return response()->json(['error' => 'Recurso no encontrado'], 404);
            }
            if (JWTAuth::user()->usr_enable == 0) {
                return response()->json(['error' => 'El usuario está bloqueado'], 404);
            }
            $user->token = "Bearer $token";

            return $user;
        } catch (JWTException $e) {
            return response()->json(['error' => 'no se pudo crear el token'], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            JWTAuth::parseToken()->authenticate();
            return response()->json([
                'success' => true,
                'message' => 'El usuario se desconectó con éxito',
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Lo sentimos, el usuario no puede ser desconectado'
            ], 500);
        }
    }
}
