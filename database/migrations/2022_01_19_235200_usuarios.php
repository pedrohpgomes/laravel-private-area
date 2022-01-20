<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function(Blueprint $table){
            $table->id();
            $table->string('usuario',50);
            $table->string('senha',200);
            $table->dateTime('last_login')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->dateTime('created_at', 0);
            $table->dateTime('updated_at', 0);
            $table->dateTime('deleted_at', 0)->nullable();
        });

        // foi colocado no seeder
        /*$usuarios = Usuario::where('usuario','teste')->where('usuario','user')->get();

         if( !isset($usuarios[0]) ):
            $insert = [
                [
                    'usuario' => 'teste@gmail.com',
                    'senha' => Hash::make('teste'),
                    'created_at' => new \dateTime(),
                    'updated_at' => new \dateTime()
                ],
                [
                    'usuario' => 'user@gmail.com',
                    'senha' => Hash::make('user'),
                    'created_at' => new \dateTime(),
                    'updated_at' => new \dateTime()
                ]
            ];
            DB::table('usuarios')->insert($insert);
        endif; */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
