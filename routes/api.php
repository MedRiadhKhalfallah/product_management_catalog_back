<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\produit\ProduitController;
use \App\Http\Controllers\produit\ProduitSearchController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::get('store-produits', [ProduitController::class, 'storeProduits']);
    Route::get('show-produit/{produit}', [ProduitController::class, 'show']);
    Route::get('category-produits', [ProduitController::class, 'getCategory']);
    Route::post('produitSearch', [ProduitSearchController::class,'store']);
});
