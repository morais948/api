<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $dados = $request->all(['email', 'password']);
        $token = auth('api')->attempt($dados);

        if($token){
            return response()->json(['token' => $token], 200);
        }else{
            return response()->json(['erro' => 'Usuário ou senha inválido'], 403);
        }
    }

    public function refresh(){
        $token = auth('api')->refresh();
        return response()->json(['token' => $token], 200);
    }

    public function logout(){
        auth('api')->logout();
        return response()->json(['msg' => 'Logout foi realizado com sucesso']);
    }

    public function me(){
        return response()->json(auth()->user());
    }

}
