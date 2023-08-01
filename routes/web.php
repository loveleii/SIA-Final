<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CustomerController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/customers/edit/{customer}',[CustomerController::class,'edit'])->middleware(['permission:edit']);
    Route::get('/customers/create',[CustomerController::class,'create'])->middleware(['permission:create']);
    Route::post('/customers', [CustomerController::class, 'store']);
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/customers/{customer}', [CustomerController::class, 'show']);
    Route::patch('/customers/{customer}',[CustomerController::class,'update']);
    Route::delete('/customers/{customer}',[CustomerController::class, 'destroy'])->middleware(['permission:delete']);
    Route::get('/customers/search/{searchKey}', [CustomerController::class, 'search']);
    Route::post('/customers/toggle/{customer}', [CustomerController::class, 'toggle'])->middleware(['permission:toggle']);
    Route::get('/customers/email/{customer}', [CustomerController::class, 'email'])->middleware(['permission:send']);
});
