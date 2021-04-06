<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * Rota para criar o usuário.
 */
Route::post('users/create', [UserController::class, 'create']);

/**
 * Rota para Login do usuário.
 */
Route::post('auth', [UserController::class, 'login']);

/**
 * Bloqueando essas rotas, somente com token válido
 */
Route::middleware(['jwt.auth'])->group(function () {
    /**
     * Rota de listagem de usuário.
     */
    Route::get('users', [UserController::class, 'index']);

    /**
     * Retornando os dados do usuário logado.
     */
    Route::get('me', [UserController::class, 'userLogado']);

    /**
     * Rota para atualizar o token do usuário.
     */
    Route::post('auth-refresh', [UserController::class, 'refreshToken']);
});