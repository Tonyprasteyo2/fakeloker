<?php

use App\Http\Controllers\Homeindex;
use App\Http\Controllers\Kebenaran;
use Illuminate\Support\Facades\Artisan;
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
Route::get('login',function(){
    return view('login');
})->name('login');
Route::post('/logiuser',[Kebenaran::class,'LoginUser'])->name('logiuser');
Route::get('/logout',[Kebenaran::class,'Logout'])->name('logout');
Route::group(['middleware' =>['auth']],function (){
    Route::group(['CekLogin:admin'],function(){
        Route::get('masterweb',[Kebenaran::class,'Dasboard'])->name('masterweb');
        Route::get('profil',[Kebenaran::class,'Profil'])->name('profil');
        Route::post('update',[Kebenaran::class,'UpdateUser'])->name('update');
        Route::get('user',[Kebenaran::class,'UserData'])->name('user');
        Route::get('/search_gugel',[Kebenaran::class,'Getapi']);
        Route::post('addalamat',[Kebenaran::class,'AddAlamat'])->name('addalamat');
        Route::get('/add',[Kebenaran::class,'Informasi'])->name("add");
        Route::get('/informasi',[Kebenaran::class,'ViewInformasi'])->name("informasi");
        Route::delete('deletealamat/{id}',[Kebenaran::class,'Deletealamat'])->name('deletealamat');
        Route::get('/editalamat/{id}',[Kebenaran::class,'Editalamat']);
        Route::post('/updatealamat',[Kebenaran::class,'UpdateAlamat'])->name('updatealamat');
        Route::get('/api',[Kebenaran::class,'Api'])->name('api');
        Route::post('/updateapi',[Kebenaran::class,'Updateapikey'])->name('updateapi');
        Route::post('/apiloginkey',[Kebenaran::class,'Loginapikey']);
        Route::get('/editalamat',function(){
            return redirect('informasi');
        });
        Route::post('/reset',[Kebenaran::class,'Reset'])->name("reset");
    });
});
Route::get('letter',function(){
    return view('layout.letter');
});
Route::get('/',[App\Http\Controllers\Homeindex::class, 'index'])->name('/');
Route::get('/index',[App\Http\Controllers\Homeindex::class, 'index'])->name('index');
Route::get('/cekloker',[Homeindex::class,'Cek'])->name('cekloker');
Route::get('/reset',function(){
    return view("reset");
});
Route::get("/cekemail",[Homeindex::class,'Emailcek']);
