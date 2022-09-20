<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
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
// // print_r('test');die;
// Route::get('/', function () {
//     dd('gjls');
// });
Route::get('/emailpage',function(){return view('emailview');});
Route::get('/index/{mid}',[AboutController::class,'index'])->name('index');
Route::any('/login',[AboutController::class,'login'])->name('login');
Route::any('/logout',[AboutController::class,'logout'])->name('logout');
Route::any('/exportdata/{id}',[AboutController::class,'exportdata'])->name('exportdata');
Route::any('/register',[AboutController::class,'register'])->name('register');
Route::any('/addEvent',[AboutController::class,'addEvent'])->name('addEvent');
Route::any('/sendEmail',[AboutController::class,'sendEmail'])->name('sendEmail');
Route::get('/printdata/{id}',[AboutController::class,'printdata']);
Route::get('/divprnt/{email}',[AboutController::class,'divprnt']);
Route::post('/sendata',[AboutController::class,'senddata'])->name('sendata');
Route::post('/printbadge',[AboutController::class,'printbadge'])->name('printbadge');
Route::any('/view_event_dt', [AboutController::class, 'view_event_dt']);
Route::any('/multidelete', [AboutController::class, 'multi_delete'])->name('multidelete');
Route::any('/singledel/{id}', [AboutController::class, 'singledelete']);
Route::any('/dataedit/{id}', [AboutController::class, 'edit']);
Route::any('/view_eventdetail_dt', [AboutController::class, 'view_eventdetail_dt']);

Route::any('/addVisitor/{id}',[AboutController::class,'addVisitor'])->name('addVisitor');

Route::any('/analytics',[AboutController::class,'analytics'])->name('analytics');
Route::any('/view_analytics_dt', [AboutController::class, 'view_analytics_dt']);
Route::get('/analyticsview/{id}',[AboutController::class,'analyticsview']);
Route::any('/view_anyalyticdetail_dt', [AboutController::class, 'view_anyalyticdetail_dt']);
Route::any('/exportdataanalytics/{id}',[AboutController::class,'exportdataanalytics'])->name('exportdataanalytics');

// Route::get('/login',function(){});