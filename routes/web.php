<?php
use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ShowsController;
use App\Http\Controllers\admin\BanerController;
use App\Http\Controllers\front\FrontController;


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

/*Route::get('/', function () {
    return view('front/index');
});*/

Route::get('/',[FrontController::class,'baner']);

Route::get('login',[FrontController::class,'login']);
Route::post('sing_up',[FrontController::class,'sing_up']);
Route::post('loginuser',[FrontController::class,'loginuser']);

Route::get('admin',[AdminController::class,'index']);
Route::post('admin/login',[AdminController::class,'login']);


Route::group(['middleware'=>'user_check'],function(){
    Route::get('bookticket/{id}',[FrontController::class,'bookticket']);
    Route::get('payment',[FrontController::class,'payment']);
    Route::get('logout', function () {
        session()->forget('FORNT_USER_LOGIN');
        session()->forget('FORNT_USER_ID');
        session()->forget('FORNT_USER_NAME');
       
        return redirect('/');  
      

    });
    Route::post('book',[FrontController::class,'book']);
    Route::get('instamojo_payment_redirect',[FrontController::class,'instamojo_payment_redirect']);
    Route::get('ticket',[FrontController::class,'ticket']);
    
});











Route::group(['middleware'=>'admin_auth'],function(){

    Route::get('admin/logout', function () {
        
        session()->forget('ADMIN_USER');
        session()->forget('ADMIN_USER_ID');
        session()->flash('error','logout sucessfully');
        return redirect('admin');
        
    });
    


    Route::get('admin/theater',[AdminController::class,'theater']);
    Route::get('admin/theater_process',[AdminController::class,'theater_process']);
    Route::get('admin/theater_process/{id}',[AdminController::class,'theater_process']);
    Route::post('admin/add_theater',[AdminController::class,'add_theater']);
    Route::get('admin/theater_room/status/{status}/{id}',[AdminController::class,'status']);
    Route::get('admin/theater_room/delete/{id}',[AdminController::class,'delete']);

    Route::get('admin/shows',[ShowsController::class,'shows']);
    Route::get('admin/shows_process',[ShowsController::class,'shows_process']);
    Route::get('admin/shows_process/{id}',[ShowsController::class,'shows_process']);
    Route::post('admin/add_shows',[ShowsController::class,'add_shows']);
    Route::get('admin/shows/status/{status}/{id}',[ShowsController::class,'status']);
    Route::get('admin/shows/delete/{id}',[ShowsController::class,'delete']);

    Route::get('admin/baner',[BanerController::class,'baner']);
    Route::get('admin/baner_process',[BanerController::class,'baner_process']);
    Route::post('admin/add_baner',[BanerController::class,'add_baner']);
     Route::get('admin/baner/status/{status}/{id}',[BanerController::class,'status']);
    Route::get('admin/baner/delete/{id}',[BanerController::class,'delete']);
    Route::get('admin/baner_process/{id}',[BanerController::class,'baner_process']);

});