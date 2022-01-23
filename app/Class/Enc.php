<?php

namespace App\Class;

class Enc{

    public function encriptar($valor){
        return bin2hex( openssl_encrypt($valor, 'aes-256-cbc','rDwOxaEpO6zutmVZ8bdj803c61qUkF0Y', OPENSSL_RAW_DATA, 'eUG7Nq0dUJgVvGqs') );
    }//function

    public function desencriptar($valor_encriptado){
        //verificar se a hash é valida
        if(strlen($valor_encriptado) % 2 != 0){
            return null;
        }

        return openssl_decrypt( hex2bin($valor_encriptado), 'aes-256-cbc', 'rDwOxaEpO6zutmVZ8bdj803c61qUkF0Y', OPENSSL_RAW_DATA, 'eUG7Nq0dUJgVvGqs' );
    }//function

}//class