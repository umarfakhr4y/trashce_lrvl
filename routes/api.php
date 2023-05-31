<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembayaranUserController;
use App\Http\Controllers\PembayaranUserKeamananController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user/{role}', 'userRole'); // Get All User By Role   
    Route::get('users/{id}', 'userId');
    Route::get('detailuser', 'detailUser');
    Route::post('updateuser/{id}', 'update');
    Route::post('login', 'login');
    Route::post('register', 'regisUser');
    // Route::get('logout', 'UserLogout');
})->middleware('auth.api');

//pembayaran kebersihan
Route::controller(PembayaranUserController::class)->group(function () {
    Route::get('/pembayaranuser/{id}', 'bayarByuserId'); // Get All User By Role   
    Route::get('/pembayaran/{id}/{bulan}', 'bayarById'); // Get All User By Role   
    Route::get('/pembayaranuserall/{bulan}', 'indexbyBulan'); // Get All User By Role   


    Route::post('/tambahpembayarankebersihan', 'store'); // create   
    Route::put('/pembayaran/{id}/{pembayaranBulan}', 'updateData'); // Edit 

})->middleware('auth.api');

//pembayaran keamanan
Route::controller(PembayaranUserKeamananController::class)->group(function () {
    Route::get('/pembayarankeamananuser/{id}', 'bayarekeamananByuserId'); // Get All User By Role   
    Route::get('/pembayarankeamanan/{id}/{bulan}', 'bayarkeamananById'); // Get All User By Role   
    Route::post('/tambahpembayarankeamanan', 'store'); // create   
    Route::put('/pembayaran/{id}/{pembayaranBulan}', 'updateData'); // Edit 
    Route::get('/pembayaranuserkeamananall/{bulan}', 'indexbyBulan'); // Get All User By Role   


})->middleware('auth.api');