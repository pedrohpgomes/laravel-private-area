<?php

use App\Mail\EmailTeste;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Main@index')->name('index');
Route::get('/login','Main@login')->name('login');
Route::post('/login_submit','Main@login_submit')->name('login_submit');
Route::get('/home','Main@home')->name('home');
Route::get('/logout','Main@logout')->name('logout');

Route::get('/aaa', function(){
    Tools::printData('Joao');
});

Route::get('/email',function(){
    $nome = 'Antonio';
    $data = ['nome' => $nome];
    Mail::to('pedro@ipb.org.br')->send(new EmailTeste($data));
});

Route::get('/edit/{id_usuario}','Main@edit')->name('edit');
Route::post('/upload','Main@upload')->name('main_upload');

Route::get('/lista_arquivos','Main@lista_arquivos')->name('main_lista_arquivos');
Route::get('/download/{file}','Main@download')->name('main_download');
