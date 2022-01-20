<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // executar com
        // php artisan db:seed --class=usuario
        $usuario = new \App\Models\Usuario;
        $usuario->usuario = 'user@gmail.com';
        $usuario->senha = Hash::make('user');
        $usuario->save();

        $usuario = new \App\Models\Usuario;
        $usuario->usuario = 'teste@gmail.com';
        $usuario->senha = Hash::make('teste');
        $usuario->save();
    }
}
