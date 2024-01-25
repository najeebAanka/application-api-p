<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('voyager.dashboard');
});

Route::get('/lang/{lang?}', [\App\Http\Controllers\SettingsControllers::class, 'changeLanguage'])->name('change-lang');
Route::get('/cc', [\App\Http\Controllers\SettingsControllers::class, 'clearCache'])->name('cc');
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

