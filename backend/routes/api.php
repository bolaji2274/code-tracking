<!-- use App\Http\Controllers\AuthController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\ApplicationController; -->
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController; // This seems to be missing


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum', 'role:admin'])->get('/dashboard/stats', [DashboardController::class, 'stats']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/livestock', [LivestockController::class, 'index']);
    Route::post('/livestock', [LivestockController::class, 'store']);
    Route::post('/applications', [ApplicationController::class, 'store']);
    Route::get('/applications', [ApplicationController::class, 'index']);
});
