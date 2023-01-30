<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ActivityController;
use App\Http\Controllers\User\GenerationController;
use App\Http\Controllers\User\MasterpieceController;
use App\Http\Controllers\User\NewsController;
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

Route::get('tes', function(){
    return view('tes');
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('berita', [NewsController::class, 'index'])->name('news');
Route::get('berita/{slug}', [NewsController::class, 'show'])->name('show_news');

Route::get('kegiatan', [ActivityController::class, 'index'])->name('activity');
Route::get('kegiatan/{slug}', [ActivityController::class, 'show'])->name('show_activity');

Route::get('karya', [MasterpieceController::class, 'index'])->name('masterpiece');

Route::get('angkatan', [GenerationController::class, 'index'])->name('generation');
Route::get('angkatan/{generation}', [GenerationController::class, 'show'])->name('show_generation');


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'verify'])->name('verify');
