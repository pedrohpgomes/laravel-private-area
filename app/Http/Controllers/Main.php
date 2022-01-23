<?php

namespace App\Http\Controllers;

use App\Class\Random;
use App\Class\Enc;
use App\Class\Logger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Foreach_;

class Main extends Controller
{   
    private $Enc;
    private $Logger;

    public function __construct(){
        $this->Enc = new Enc();
        $this->Logger = new Logger();
    }//construct

    // =========================================
    public function index(){

        if( $this->checkSession() ):
           return redirect()->route('home');
        else:
            return redirect()->route('login');
        endif;

        
    }//function

    // =========================================
    private function checkSession(){
        return session()->has('usuario');
    }

    // =========================================
    public function login(){
        if( $this->checkSession() ):
            return redirect()->route('index');
        endif;
        $data = [];
        $error = session('error');

        if(!empty($error)){
            $data = ['error' => $error];
        }
        return view('login',$data);
    }//function

    // =========================================
    public function login_submit(LoginRequest $request){

        //verifica se houve submissao de formulario
        if(!$request->isMethod('post')){
            return redirect()->route('index');
        }        
        
        if($this->checkSession()){
            return redirect()->route('index');
        }

        //primeiro validar o formulario (request)
        $request->validated();

        $email = trim($request->input('text_user'));
        $senha = trim($request->input('text_password'));

        $usuario = Usuario::where('usuario',$email)->first();

        /* if( !$usuario || !Hash::check($senha,$usuario->senha) ):
            return redirect('login')->with('danger','User or password invalid');
        endif; */

        if(!$usuario):
            //logger
            $this->Logger->log('error',"usuario $email inexistente para login");
            session()->flash('error',['User do not exist']);
            return redirect()->route('login');
        endif;

        if(!Hash::check($senha,$usuario->senha)):
            //logger
            $this->Logger->log('error',"usuario $usuario->usuario - senha inválida para login");
            session()->flash('error',['Invalid password']);
            return redirect()->route('login');
        endif;

        //login válido
        session()->put('usuario',$usuario);       
        //Logger
        $this->Logger->log('info','fez o seu login');

        return redirect()->route('index');
    }//function

    // =========================================
    public function home(){
        if( !$this->checkSession() ){
            return redirect()->route('login');
        }
        $a = new Random();
        //echo $a->teste();
        return view('home');
             
    }//function

    // =========================================
    public function logout(){
        //logfer
        $this->Logger->log('info','fez logout no sistema');

        session()->forget('usuario');        
        return redirect()->route('index');
    }//function

    // =========================================
    public function edit($id_usuario){
        $enc = $this->Enc->encriptar($id_usuario);
        echo "vou editar os dados do usuario $enc<br><br>";
        $enc2 = $this->Enc->desencriptar($enc);
        echo 'valor desencriptado: '. $enc2 . '<br>';
    }//function

    // =========================================
    public function upload(Request $request){

        //VALIDACAO DO UPLOAD
        $validate = $request->validate(
            //rules
            [
                'arquivo' => 'required|image|mimes:jpeg|max:500|dimensions:min_width=100,min_height=100,max_width=1000,max_height=500'
            ],
            //error messages
            [
                'arquivo.required' => 'A imagem é obrigatória',
                'arquivo.image' => 'Deve carregar uma imagem',
                'arquivo.mimes' => 'A imagem deve ser formato .jpg',
                'arquivo.max' => 'Imagem deve ter no maximo 500kB',
                'arquivo.dimensions' => 'Dimensões inválidas'

            ]
        );
        // se nao colocar o nome do arquivo, ele gera um hash para o nome
        $request->arquivo->storeAs('public/images','novo.jpg');
        echo 'terminado';
    }//function

    // ========================================
    public function lista_arquivos(){

        $files = Storage::files('public/images');

        foreach ($files as $file) {
            $href = route('main_download',['file' => $file]);
            echo $file." - <a href='$href'>Baixar</a><br>";
        }

    }//function

    // ========================================
    public function download($file){
        return response()->download("storage/images/$file");
    }//function
    

}//class
