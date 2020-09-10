<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RoleCheckMiddleware;

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
    define('menus', [ ['text' => 'IMPORT', 'href' => 'import', 'icon' => 'file-import'],['text' => 'VIEW', 'href' => 'admin.view'] ]);

Route::view('/','login')->name('login')->middleware('guest');
Route::post('/','LoginController@login');

Route::group([
    'middleware'    => 'auth'
],function(){
    define('HEAD',\App\Http\Controllers\RecordController::HeadRecords()); define('HEAD_FIELD_DISPLAY',\Illuminate\Support\Arr::pluck(HEAD,'field','display'));
    Route::get('home',function (){ $route = Auth::user()->role . '.dashboard'; return redirect()->route($route); })->name('home');
    Route::get('logout',function (){ Auth::logout(); return redirect()->route('home'); })->name('logout');
    Route::view('profile','profile')->name('profile');
    Route::post('profile',function(){ $user = \App\User::find(Auth::id()); foreach (['name','email','password'] as $field) if(request()->$field) $user->$field = request()->$field; $user->save(); \App\Activity::activity('Profile updated'); return back(); });
    Route::get('detail/{id}',function ($id){ return view('detail',['id' => $id]); })->name('detail');
    Route::post('preview','ExportController@preview')->name('records.preview');

    Route::group([
        'middleware'    => RoleCheckMiddleware::class,
    ],function(){
        Route::group([
            'prefix'        =>  'admin',
        ],function(){
            Route::match(['get','post'],'import','ImportController@start')->name('import');
            Route::view('export','admin.export')->name('admin.export');
            Route::view('dashboard','admin.dashboard')->name('admin.dashboard');
            Route::view('view','admin.view')->name('admin.view');
            Route::view('new','admin.new')->name('admin.new');
            Route::view('pending','admin.pending')->name('admin.pending');
            Route::view('rejected','admin.rejected')->name('admin.rejected');
            Route::view('approved','admin.approved')->name('admin.approved');
            Route::view('broker','admin.broker')->name('admin.broker');
            Route::view('report','admin.report')->name('admin.report');
            Route::match(['get','post'],'admins',function (){ return view('admin.admins'); })->name('admins');
            Route::match(['get','post'],'brokers',function (){ return view('admin.brokers'); })->name('brokers');
            Route::match(['get','post'],'compliance',function (){ return view('admin.compliance'); })->name('compliance');
        });
        Route::group([
            'prefix'        =>  'broker',
        ],function(){
            Route::view('dashboard','broker.dashboard')->name('broker.dashboard');
            Route::match(['get','post'],'view','RecordController@Broker')->name('broker.view');
            Route::view('new','broker.new')->name('broker.new');
            Route::view('pending','broker.pending')->name('broker.pending');
            Route::view('submitted','broker.submitted')->name('broker.submitted');
            Route::view('unreviewed','broker.unreviewed')->name('broker.unreviewed');
            Route::view('incomplete','broker.incomplete')->name('broker.incomplete');
            Route::view('rejected','broker.rejected')->name('broker.rejected');
            Route::view('approved','broker.approved')->name('broker.approved');
        });
        Route::group([
            'prefix'        =>  'compliance',
        ],function(){
            Route::view('dashboard','compliance.dashboard')->name('compliance.dashboard');
            Route::match(['get','post'],'view','RecordController@Compliance')->name('compliance.view');
            Route::view('pending','compliance.pending')->name('compliance.pending');
            Route::view('approved','compliance.approved')->name('compliance.approved');
            Route::view('rejected','compliance.rejected')->name('compliance.rejected');
            Route::view('incomplete','compliance.incomplete')->name('compliance.incomplete');
            Route::view('export','compliance.export')->name('compliance.export');
            Route::view('broker','compliance.broker')->name('compliance.broker');
            Route::view('report','compliance.report')->name('compliance.report');
        });
    });
});
