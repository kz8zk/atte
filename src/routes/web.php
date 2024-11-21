<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TimeManagementController;
use Illuminate\Support\Facades\Auth;

// use App\Http\Controllers\AuthenticatedSessionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// ユーザー認証画面
Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->middleware('auth');
});


// 勤怠管理一覧画面
// Route::get('/admin', [TimeManagementController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [TimeManagementController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    // 勤務開始ボタン
    Route::get('/attendance/start', [TimeManagementController::class, 'start'])->name('attendance.start');

    // 勤務終了ボタン
    Route::get('/attendance/end', [TimeManagementController::class, 'end'])->name('attendance.end');

    // 休憩開始ボタン
    Route::get('/attendance/rest-start', [TimeManagementController::class, 'restStart'])->name('attendance.restStart');

    // 休憩終了ボタン
    Route::get('/attendance/rest-end', [TimeManagementController::class, 'restEnd'])->name('attendance.restEnd');

    Route::middleware('auth')->group(function () {
        Route::get('/admin', [TimeManagementController::class, 'index'])->name('admin'); // ルート名を付与
    });

});
