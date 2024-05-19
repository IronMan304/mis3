<?php

use Illuminate\Http\Request;
use App\Events\BroadcastingEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Request\RequestForm;
use App\Http\Livewire\Request\RequestList;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\ServiceRequestController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/webhook', function (Request $request) {
    event (new BroadcastingEvent(

        name: 'message-received',
        data: [
            'message_id' => $request['id'],
            'message_text' => $request['message'],
        ]
        )
    );
});


Route::group(['middleware'=> ['auth:sanctum']], function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/requests', [RequestController::class, 'index']);
    Route::post('/requests', [RequestController::class, 'store']);
    //Route::post('/service_requests', [ServiceRequestController::class, 'store']);
    
    Route::get('/requests/{id}', [RequestController::class, 'show']);
    Route::put('/requests/{id}', [RequestController::class, 'update']);
    Route::delete('/requests/{id}', [RequestController::class, 'destroy']);
    Route::get('/requests/search/{request_number}', [RequestController::class, 'search']);
    //Route::post('/requests', [RequestForm::class, 'store']);
    //Route::post('requestss', [RequestForm::class, 'store']);

    Route::prefix('service_requests')->group(function () {
        Route::get('/', [ServiceRequestController::class, 'index']); // Assuming you have an index method in your controller
        Route::get('/{id}', [ServiceRequestController::class, 'id']);
        Route::post('/', [ServiceRequestController::class, 'store']);
    });
    //Route::post('/requests', [RequestForm::class, 'store']);

});
