<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/addsous',[PostController::class,'addsous']);
Route::post('/addsup',[PostController::class,'addsup']);
Route::delete('/deleteprod/{id}',[PostController::class,'deleteprod']);
Route::delete('/deletecom/{id}',[PostController::class,'Annuler']);


Route::get('/hote',[PostController::class,'retour']);
Route::get('/hote2',[PostController::class,'retour2']);

Route::post('/create',[PostController::class,'store']);
Route::get('/choses',[PostController::class,'chose']);
Route::delete('/deletesup/{id}',[PostController::class,'deletesup']);
Route::delete('/deletesous/{id}',[PostController::class,'deletesous']);
Route::get('/produits/{id}',[PostController::class,'trouver']);
Route::post('/enregistrement',[PostController::class,'enregistrer']);
Route::get('/test/{id}',[PostController::class,'testRelation']);
Route::get('/avoir/{id}',[PostController::class,'Trouvecategorie']);
Route::post('/adduser',[PostController::class,'Adduser']);
Route::post('/ajoutprod',[PostController::class,'ajoutProduit']);
Route::post('/addsousproduit',[PostController::class,'addsous']);
Route::post('/verifier',[PostController::class,'tentifier']);
Route::get('/perso/{id}',[PostController::class,'commandcli']);
Route::get('/compter/{id}',[PostController::class,'nombre']);
Route::post('/modifier/{id}',[PostController::class,'modifier']);
Route::post('/payement/{id}',[PostController::class,'payer']);
Route::get('/commandeinfo/{id}',[PostController::class,'commandeinfo']);
