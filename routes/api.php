<?php

use Illuminate\Http\Request;

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

Route::resource('users', 'UsersEndpoint');
Route::post('users/login', 'UsersEndpoint@login');

Route::resource('demande', 'DemandesEndpoint');
Route::get('demande/{demande}', 'DemandesEndpoint@UserAcceptDemande');

Route::resource('validation', 'ValidationsEndpoint');