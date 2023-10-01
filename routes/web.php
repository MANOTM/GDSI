<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MarcheController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\distributionController;
use App\Http\Controllers\distributionController1;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ImportExelController;
use App\Http\Controllers\EtablissementController;

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

// auth routes
Route::controller(AuthController::class)->group(function () {
    
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::get('/logout', 'logout')->name('logout');

});

################### Marche ##############

Route::middleware('auth')->group(function () {
    Route::get('/', [MarcheController::class,'index']);
    Route::resource('marche',MarcheController::class)->except(['show','update']);

});
################### Article ##############

Route::resource('article',ArticleController::class)
    ->except(['show','edit','update']);

################### etablissement ##############

Route::prefix('etablissement')->name('etablissement.')->
controller(EtablissementController::class)->middleware('auth')->group(function () {
    
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::post('/find', 'findEta')->name('find');

});

################### Employer ##############
Route::prefix('employer')->name('employer.')->controller(EmployerController::class)
->middleware('auth')->group(function () {
    
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');

});


################### Exel Import ##############
Route::prefix('import')->name('import.')->controller(ImportExelController::class)
->middleware('auth')->group(function () {
    Route::post('/employer', 'importEmployer')->name('employer');
    Route::post('/etablissemnet','importEtablissemet')->name('etablissement');

});

################### Profile ##############

Route::prefix('profile')->controller(ProfileController::class)
->middleware('auth')->group(function () {
    
    Route::get('/', 'profile')->name('profile'); 
    Route::post('/{user}/edit', 'edit')->name('profile.edit'); 

});

################### Distribution ##############
// route dyal page employer => etablisement
Route::get('/distribution/employer/{etab_id?}/{article_id?}',[distributionController::class,'etablisement_index'])->name('distribution.employer');
Route::post('/distribution/employer/find',[distributionController::class,'employer_find'])->name('distribution.find');
Route::post('/distribution/employer',[distributionController::class,'store_employer'])->name('distribution.store_employer');
// route dyal page DB => article
Route::get('/distribution/{article_id?}',[distributionController::class,'index'])->name('distribution');
Route::post('/distribution',[distributionController::class,'store_db'])->name('distribution.store_db');
// route dyal page etablisement => DB
Route::get('/distribution/etablisement/{Db_id?}',[distributionController::class,'Db_index'])->name('distribution.Db');
Route::post('/distribution/etablisement',[distributionController::class,'store_etab'])->name('distribution.store_etab');


################ Dashboard ##############

Route::controller(HomeController::class)->middleware('auth')->group(function(){
    Route::get('/', 'index')->name('home'); 
    Route::get('/search', 'search')->name('search');
});


// lang routes
Route::get('convertLanguage/{locale}', [HomeController::class, 'convertLanguage'])->name('convertLanguage');
// pages switch routes
Route::get('/{page}', [AdminController::class, 'index'])->middleware('auth');
