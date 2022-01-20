<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Http\Requests\LoginRequest;

class Main extends Controller
{
    // =========================================
    public function index(){

        if( session()->has('usuario') ):
            echo 'logado';
        else:
            return redirect()->route('login');
        endif;
    }//function

    // =========================================
    public function login(){
        return view('login');
    }//function

    // =========================================
    public function login_submit(LoginRequest $request){

        //primeiro validar o formulario (request)
        $request->validated();

        $email = trim($request->input('text_user'));
        $senha = trim($request->input('text_password'));

        $usuario = Usuario::where('usuario',$email)->first();

        if( !$usuario || !Hash::check($senha,$usuario->senha) ):
            return redirect('login')->with('danger','User or password invalid');
        endif;



    }//function

    // =========================================

    

}//class
