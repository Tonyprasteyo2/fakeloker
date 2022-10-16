<?php

use App\Http\Controllers\Kebenaran;
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
Route::post('logiuser',[Kebenaran::class,'LoginUser'])->name('logiuser');
Route::get('logout',[Kebenaran::class,'Logout'])->name('logout');
Route::group(['middleware' =>['auth']],function (){
    Route::group(['CekLogin:admin'],function(){
        Route::get('masterweb',[Kebenaran::class,'Dasboard'])->name('masterweb');
        Route::get('profil',[Kebenaran::class,'Profil'])->name('profil');
        Route::post('update',[Kebenaran::class,'UpdateUser'])->name('update');
        Route::get('logout',[Kebenaran::class,'Logout'])->name('logout');
        Route::get('user',[Kebenaran::class,'UserData'])->name('user');
        Route::delete('user/{id}',[Kebenaran::class,'DeleteUser'])->name('user');
        Route::get('view/{id}',[Kebenaran::class,'ViewUser'])->name('view');
        Route::post('updatemember',[Kebenaran::class,'UpdateMember'])->name('updatemember');
        Route::get('add',[Kebenaran::class,'Informasi'])->name('add');
        Route::post('addusernew',[Kebenaran::class,'AddUserNew'])->name('addusernew');
        Route::get('search_gugel',[Kebenaran::class,'curl'])->name('search_gugel');
        Route::post('addalamat',[Kebenaran::class,'AddAlamat'])->name('addalamat');
    });
    Route::group(['CekLogin:member'],function (){
        Route::get('member',function(){
            return view('member.index');
        });
    });
});
Route::get('letter',function(){
    return view('layout.letter');
});