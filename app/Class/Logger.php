<?php

namespace App\Class;

use Illuminate\Support\Facades\Log;

class Logger{
    public function log($level='info', $message){

        //tenta adicionar à mensagem a identificacao do usuario ativo
        if( session()->has('usuario') ){
            $message = '['.session('usuario')->usuario . '] - ' . $message;
        } else {
            $message = '[N/A] - ' . $message;
        }

        //registra entrada nos logs
        Log::channel('main')->$level($message);
    }//function

}//class