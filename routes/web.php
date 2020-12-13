<?php

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
Route::get('/', function () {
    return redirect('login');
})->name('/');
Route::post('/request', 'HomeController@request')->name('request');
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@index')->name('index');
Route::get('/report', 'HomeController@report')->name('report');
Route::post('/report', 'HomeController@report')->name('report');
Route::get('/info/delete/{id}', 'HomeController@destroy');
Route::post('/adddaily','HomeController@store');
Route::post('/updateinfo','HomeController@update');
Route::get('/infofill/{id?}',function($id = 0){
    $dt=App\Info::where('info_id','=',$id)->get();
    return $dt;
});
Route::get('/getexecutor/{id?}',function($id = 0){
    $dt=DB::select('select e.* from EXECUTOR e
    where executor_par='.$id .' and e.executor_id !=e.executor_par
    order by executor_abbr');
    return $dt;
});

Route::get('/user', 'UserController@index')->name('user');
Route::post('/report', 'UserController@index')->name('user');
Route::get('/inuserfo/delete/{id}', 'UserController@destroy');
Route::post('/adduser','UserController@store');
Route::post('/updateuser','UserController@update');
Route::get('/userfill/{id?}',function($id = 0){
    $dt=App\User::where('id','=',$id)->get();
    return $dt;
});