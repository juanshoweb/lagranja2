<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstagramController;
use Inertia\Inertia;

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

/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/


/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});*/


Route::get('/', [\App\Http\Controllers\RestaurantController::class, 'index'])->name('index');
Route::get('/events', [\App\Http\Controllers\RestaurantController::class, 'event'])->name('events');
Route::get('/instagram', [\App\Http\Controllers\RestaurantController::class, 'getInstagramData'])->name('instagram');

Route::get('/themostrequested', [\App\Http\Controllers\RestaurantController::class, 'getTheMostRequested'])->name('the-most-requested');


Route::get('/instagram/photos', [InstagramController::class, 'getPhotos']);

// Ruta para redireccionar al usuario a la página de autorización de Instagram
Route::get('/auth/instagram', [InstagramController::class, 'redirectToInstagram'])->name('auth.instagram');

// Ruta para manejar la respuesta de Instagram después de que el usuario autorice la aplicación
Route::get('/auth/instagram/callback', 'InstagramController@handleInstagramCallback');