<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
     //liste des admin
     Route::get('Admin',[AdminController::class,'index']);
     //Ajout admin
     Route::post("Admin","App\Http\Controllers\AdminController@save");
     //Modifier admin
     Route::put("Admin",[AdminController::class,'update']);
     //supprimer admin
     Route::delete('Admin/{id}',[AdminController::class,'delete']);
     //rechercher admin
     Route::get('Admin/{id}',[AdminController::class,'getById']);


     //liste des Employee
     Route::get('Employee',[EmployeeController::class,'index']);
     //Ajout Employee
     Route::post("Employee","App\Http\Controllers\EmployeeController@save");
     //Modifier Employee
     Route::put("Employee",[EmployeeController::class,'update']);
     //supprimer Employee
     Route::delete('Employee/{id}',[EmployeeController::class,'delete']);
     //rechercher Employee
     Route::get('Employee/{id}',[EmployeeController::class,'getById']);
    

     //liste des Fiches
     Route::get('Fiches',[FichesController::class,'index']);
     //Ajout Fiches
     Route::post("Fiches","App\Http\Controllers\FichesController@save");
     //Modifier Fiches
     Route::put("Fiches",[FichesController::class,'update']);
     //supprimer Fiches
     Route::delete('Fiches/{id}',[FichesController::class,'delete']);
     //rechercher Fiches
     Route::get('Fiches/{id}',[FichesController::class,'getById']);


     //liste des Medecin
     Route::get('Medecin',[MedecinController::class,'index']);
     //Ajout Medecin
     Route::post("Medecin","App\Http\Controllers\MedecinController@save");
     //Modifier Medecin
     Route::put("Medecin",[MedecinController::class,'update']);
     //supprimer Medecin
     Route::delete('Medecin/{id}',[MedecinController::class,'delete']);
     //rechercher Medecin
     Route::get('Medecin/{id}',[MedecinController::class,'getById']);


 
});
