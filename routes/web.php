<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Data\User;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\ActivityController;
use App\Http\Controllers\User\GenerationController;
use App\Http\Controllers\User\InternalController;
use App\Http\Controllers\User\ManagerController;
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


Route::prefix('data')->name('data.')->group(function(){
    Route::get('user', [DataController::class, 'user'])->name('user');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::resource('pengguna', UserController::class);
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('berita', [NewsController::class, 'index'])->name('news');
Route::get('berita/{slug}', [NewsController::class, 'show'])->name('show_news');

Route::get('kegiatan', [ActivityController::class, 'index'])->name('activity');
Route::get('kegiatan/{slug}', [ActivityController::class, 'show'])->name('show_activity');

Route::get('karya', [MasterpieceController::class, 'index'])->name('masterpiece');

Route::get('angkatan', [GenerationController::class, 'index'])->name('generation');
Route::get('angkatan/{generation}', [GenerationController::class, 'show'])->name('show_generation');

Route::get('pengurus/{year}/{division}', [ManagerController::class, 'index'])->name('manager');

Route::get('tentang', [AboutController::class, 'index'])->name('about');


Route::get('dokumen/sejarah', [InternalController::class, 'history'])->name('history');
Route::get('dokumen/mantan-ketua', [InternalController::class, 'leader'])->name('leader');

Route::get('masuk', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'verify'])->name('verify');
