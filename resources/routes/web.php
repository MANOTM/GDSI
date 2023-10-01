<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MarcheController;
use App\Http\Controllers\ArticleController;
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

// login routes
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// marche routes
Route::get('/', [MarcheController::class, 'index']);
Route::resource('marche',MarcheController::class);
// article routes
Route::resource('article',ArticleController::class);

################### etablissement ##############

Route::get('/etablissement/create', [EtablissementController::class,'create'])->name('etablissement.create');
Route::post('/etablissement/store', [EtablissementController::class,'store'])->name('etablissement.store');
Route::post('/etablissement/find', [EtablissementController::class,'findEta'])->name('etablissement.find');

################### Employer ##############

Route::get('/employer/create', [EmployerController::class,'create'])->name('employer.create');
Route::post('/employer/store', [EmployerController::class,'store'])->name('employer.store');


################### Exel Import ##############
Route::post('/import/employer', [ImportExelController::class,'importEmployer'])->name('import.employer');
Route::post('/import/etablissemnet', [ImportExelController::class,'importEtablissemet'])->name('import.etablissement');




// lang routes
Route::get('convertLanguage/{locale}', [HomeController::class, 'convertLanguage'])->name('convertLanguage');
// pages switch routes
Route::get('/{page}', [AdminController::class, 'index'])->middleware('auth');
