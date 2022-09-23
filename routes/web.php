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
Route::any('/view_event_dt_past', [AboutController::class, 'view_event_dt_past']);
Route::any('/multidelete', [AboutController::class, 'multi_delete'])->name('multidelete');
Route::any('/singledel/{id}', [AboutController::class, 'singledelete']);
Route::any('/dataedit/{id}', [AboutController::class, 'edit']);
Route::any('/dataupdate/{id}', [AboutController::class, 'update'])->name('update');
Route::any('/view_eventdetail_dt', [AboutController::class, 'view_eventdetail_dt']);

Route::any('/addVisitor/{id}',[AboutController::class,'addVisitor'])->name('addVisitor');

Route::any('/analytics',[AboutController::class,'analytics'])->name('analytics');
Route::any('/view_analytics_dt', [AboutController::class, 'view_analytics_dt']);
Route::get('/analyticsview/{id}',[AboutController::class,'analyticsview']);
Route::any('/view_anyalyticdetail_dt', [AboutController::class, 'view_anyalyticdetail_dt']);
Route::any('/exportdataanalytics/{id}',[AboutController::class,'exportdataanalytics'])->name('exportdataanalytics');
Route::any('useraccount',[AboutController::class,'user_account'])->name('useraccount');
Route::any('addguest',[AboutController::class,'add_guest'])->name('addguest');
Route::any('editvisitor',[AboutController::class,'editvisitor'])->name('editvisitor');
Route::any('viewvisitor',[AboutController::class,'viewvisitor'])->name('viewvisitor');
Route::any('updateguest',[AboutController::class,'updateguest'])->name('updateguest');

// Route::get('/login',function(){});

Route::any('/new',function(){return view('new-design/index');});
Route::any('/sign-up',function(){return view('new-design/auth/sign_up');});
Route::any('/sign-in',function(){return view('new-design/auth/sign_in');});
Route::any('/add-event',function(){return view('new-design/add-event');});
Route::any('/create-event',function(){return view('new-design/create-event');});
Route::any('/dashboard',function(){return view('new-design/dashboard');});
Route::any('/analytics',function(){return view('new-design/analytics');});
Route::any('/analytics-booth-name',function(){return view('new-design/analytics-booth-name');});
Route::any('/setting',function(){return view('new-design/setting');});
Route::any('/email',function(){return view('new-design/email');});
Route::any('/campaign-nformation',function(){return view('new-design/campaign-nformation');});

Route::any('/my-event',function(){return view('new-design/my-event');});
Route::any('/my-account',function(){return view('new-design/my-account');});
Route::any('/guests',function(){return view('new-design/guests');});

