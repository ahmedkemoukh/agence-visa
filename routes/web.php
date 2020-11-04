<?php

use App\Http\Controllers\visaDemand;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('/tablau',function(){
return view('layout_agence.tablau');
});
Auth::routes();
Route::get('/distination/listitem', 'DistinationController@listitem');
Route::get('/distination/dossier_recharche', 'DistinationController@dossierrecharche');
Route::resource('/distination', 'DistinationController');

Route::POST('/demande/status', 'DemandeController@status');
Route::resource('/demande', 'DemandeController');


Route::POST('/demande/{upload}', 'DemandeController@update');
Route::POST('/distination/{id}', 'DistinationController@update');
Route::get('/visa/listitem', 'VisaController@listitem');
Route::get('/visa/promotion', 'VisaController@promotion');
Route::get('/visa/visa_recharche', 'VisaController@visarecharche');
Route::get('/visa/promotion_recharche', 'VisaController@promotionrecharch');
Route::resource('/visa', 'VisaController');
Route::POST('/visa/{update}', 'VisaController@update');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/listDemand','visaDemand@index');
Route::POST('/listDemand/{id}/uploadfile','visaDemand@uploadEvisa');
Route::POST('/listDemand/{id}/refuse','visaDemand@refuse');
Route::get('/listDemand/demand_recharche','visaDemand@demandrecharche');


Route::get('/listDemand/{id}','visaDemand@show');
Route::Post('/listDemand/{id}','visaDemand@destroy');

Route::resource('/fileupload', 'FileUploadController');
Route::get('/listDossier/dossier_recharche', 'dossierController@dossierecharche');

Route::resource('/listDossier', 'dossierController');
Route::get('/agence/agence_charche', 'AgenceController@agencecharche');
Route::get('/agence/ajouterAgence', 'AgenceController@ajouterAgence');
Route::resource('/agence', 'AgenceController');


Route::resource('/listagence', 'AgenceController');
Route::POST('/user/{id}', 'UserController@update');
Route::get('/user/{id}', 'UserController@edit');
Route::POST('/user', 'UserController@store');
Route::get('/user', 'UserController@index')->name('user');









