<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RequestController;

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

Route::get('/requests', [RequestController::class, 'index']);
Route::post('/requests', [RequestController::class, 'store']);
Route::get('/requests/{id}', [RequestController::class, 'show']);
Route::put('/requests/{id}', [RequestController::class, 'update']);
Route::delete('/requests/{id}', [RequestController::class, 'destroy']);
Route::get('/requests/search/{request_number}', [RequestController::class, 'search']);

// Route::post('/users', function(){
//     return User::create([
//         'first_name' => 'api_first_name',
//         'middle_name' => 'api_middle_name',
//         'last_name' => 'api_last_name',
//         'email' => 'api_email@gmail.com',
//         'password' => bcrypt('api_password'),
//     ])->assignRole('requester');
// });
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
