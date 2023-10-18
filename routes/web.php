<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/delete-etudiant/{id}', [UsersController::class, 'delete_etudiant']);
Route::get('/update-etudiant/{id}', [UsersController::class, 'update_etudiant']);
Route::post('/update/traitement', [UsersController::class, 'update_etudiant_traitement']);
Route::get('/etudiant', [UsersController::class, 'liste_etudiant']);
Route::get('/ajouter', [UsersController::class, 'ajouter_etudiant']);
Route::post('/ajouter/traitement', [UsersController::class, 'ajouter_etudiant_traitement']);


Route::get('/tuteur', [UsersController::class, 'liste_tuteur']);
Route::get('/ajouterTuteur', [UsersController::class, 'ajouterTuteur_tuteur']);
Route::get('/delete-tuteur/{id}', [UsersController::class, 'delete_tuteur']);
Route::get('/update-tuteur/{id}', [UsersController::class, 'update_tuteur']);
Route::post('/updateTuteur/traitement', [UsersController::class, 'updateTuteur_traitement']);
Route::post('/ajouterTuteur/traitement', [UsersController::class, 'ajouterTuteur_tuteur_traitement']);