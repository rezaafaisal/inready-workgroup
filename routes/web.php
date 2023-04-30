<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GenerationController as AdminGenerationController;
use App\Http\Controllers\Admin\Ledger\DocumentController;
use App\Http\Controllers\Admin\Ledger\HistoryController;
use App\Http\Controllers\Admin\Ledger\JuklisConstroller;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\Structure\BphController;
use App\Http\Controllers\Admin\Structure\BpoController;
use App\Http\Controllers\Admin\Structure\DpoController;
use App\Http\Controllers\Admin\Structure\ElderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Data\User;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\ActivityController;
use App\Http\Controllers\User\GenerationController;
use App\Http\Controllers\User\InternalController;
use App\Http\Controllers\User\ManagerController;
use App\Http\Controllers\User\MasterpieceController;
use App\Http\Controllers\User\NewsController;
use App\Http\Controllers\User\ProfileController;
use App\Models\Role;
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

// Route::get('tes', [TestController::class, 'index']);
// Route::get('kirim', [MailController::class, 'verifyEmail']);
// Route::get('kirim/email', [MailController::class, 'view']);

Route::prefix('data')->name('data.')->controller(DataController::class)->group(function(){
    Route::get('user', 'user')->name('user');
    Route::get('note', 'note')->name('note');
    Route::get('dokumen/{type}', 'document')->name('document');
});

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('home');

    Route::resource('pengguna', UserController::class);
    Route::post('pengguna/import', [UserController::class, 'import'])->name('pengguna.import');
    Route::get('pengguna/{id}/reset', [UserController::class, 'reset'])->name('pengguna.reset');
    Route::post('pengguna/{id}/reset', [UserController::class, 'reseted'])->name('pengguna.reseted');

    Route::prefix('note')->name('note.')->controller(NoteController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });

    Route::prefix('angkatan')->name('generation.')->group(function(){
        Route::get('/', [AdminGenerationController::class, 'index'])->name('index');
        Route::post('tambah', [AdminGenerationController::class, 'create'])->name('create');
        Route::post('perbarui', [AdminGenerationController::class, 'set'])->name('set');
        // tambah periode
        Route::get('periode', [AdminGenerationController::class, 'createPeriod'])->name('createPeriod');
    });
    Route::prefix('struktur-organisasi')->name('structure.')->group(function(){
        Route::controller(ElderController::class)->prefix('pembina')->name('elder.')->group(function(){
            Route::get('kelola', 'search')->name('search');
            Route::post('kelola','create')->name('create');
            Route::get('{period?}', 'index')->name('index');
        });
        Route::controller(DpoController::class)->prefix('dpo')->name('dpo.')->group(function(){
            Route::get('kelola', 'search')->name('search');
            Route::post('kelola','create')->name('create');
            Route::get('{period?}', 'index')->name('index');
        });
        Route::controller(BphController::class)->prefix('bph')->name('bph.')->group(function(){
            Route::get('kelola/{period?}', 'search')->name('search');
            Route::post('kelola','create')->name('create');
            Route::post('divisi', 'createDivision')->name('createDivision');
            Route::put('divisi', 'setDivision')->name('setDivision');
            Route::delete('divisi', 'destroyDivision')->name('destroyDivision');
            Route::get('{period?}', 'index')->name('index');
        });

        Route::controller(BpoController::class)->prefix('bpo')->name('bpo.')->group(function(){
            Route::get('kelola/{period?}', 'search')->name('search');
            Route::post('kelola','create')->name('create');
            Route::post('divisi', 'createDivision')->name('createDivision');
            Route::put('divisi', 'setDivision')->name('setDivision');
            Route::delete('divisi', 'destroyDivision')->name('destroyDivision');
            Route::get('{period?}', 'index')->name('index');
        });
    });
    Route::prefix('buku-besar')->name('ledger.')->group(function(){
        Route::prefix('sejarah')->name('history.')->group(function($row){
            Route::get('/', [HistoryController::class, 'index'])->name('index');
            Route::put('/', [HistoryController::class, 'update'])->name('update');
        });
        Route::prefix('dokumen')->name('document.')->group(function(){
            Route::get('/{type}', [DocumentController::class, 'index'])->name('index');
            Route::get('{type}/create', [DocumentController::class, 'create'])->name('create');
            Route::get('{type}/edit/{id}', [DocumentController::class, 'edit'])->name('edit');
            Route::post('/{type}', [DocumentController::class, 'store'])->name('store');
            Route::put('{type}/{id}', [DocumentController::class, 'update'])->name('update');
            Route::delete('{type}', [DocumentController::class, 'destroy'])->name('destroy');
        });
    });

});

Route::prefix('pengguna')->name('user.')->group(function(){
    Route::get('profil', [ProfileController::class, 'index'])->name('profile');
    Route::get('pengaturan/profil', [ProfileController::class, 'profile'])->name('setting.profile');
    Route::post('pengaturan/profil', [ProfileController::class, 'setProfile'])->name('setting.setProfile');
    Route::get('pengaturan/pribadi', [ProfileController::class, 'personal'])->name('setting.personal');
    Route::post('pengaturan/pribadi', [ProfileController::class, 'setPersonal'])->name('setting.setPersonal');
    Route::get('pengaturan/akun', [ProfileController::class, 'account'])->name('setting.account');
    Route::post('pengaturan/akun/email', [MailController::class, 'verifyEmail'])->name('verifyEmail');
    Route::get('pengaturan/akun/email/batal', [ProfileController::class, 'cancelVerifyEmail'])->name('cancelVerifyEmail');
    Route::post('pengaturan/akun/sandi-baru', [ProfileController::class, 'setPassword'])->name('setPassword');
    Route::get('pengaturan/lainnya', [ProfileController::class, 'etcetera'])->name('setting.etcetera');
    
    Route::prefix('lainnya')->name('etcetera.')->group(function($row){
        Route::post('pendidikan', [ProfileController::class, 'education'])->name('education');
        Route::post('organisasi', [ProfileController::class, 'organization'])->name('organization');
        Route::post('sosmed', [ProfileController::class, 'social'])->name('social');
    });
});
// verifikasi email baru

Route::middleware('check')->group(function(){
    Route::get('email/verifikasi/{key}', [ProfileController::class, 'verifyEmail'])->name('verifyEmail');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('berita', [NewsController::class, 'index'])->name('news');
    Route::get('berita/{slug}', [NewsController::class, 'show'])->name('show_news');
    
    Route::get('kegiatan', [ActivityController::class, 'index'])->name('activity');
    Route::get('kegiatan/{slug}', [ActivityController::class, 'show'])->name('show_activity');
    
    Route::get('karya', [MasterpieceController::class, 'index'])->name('masterpiece');
    
    Route::get('angkatan', [GenerationController::class, 'index'])->name('generation');
    Route::get('angkatan/semua', [GenerationController::class, 'all'])->name('all_generation');
    Route::get('angkatan/{generation}/{keyword?}', [GenerationController::class, 'show'])->name('show_generation');
    
    Route::get('pengurus/{year}/{division}', [ManagerController::class, 'index'])->name('manager');
    
    Route::get('tentang', [AboutController::class, 'index'])->name('about');
    
    
    Route::get('dokumen/sejarah', [InternalController::class, 'history'])->name('history');
    Route::get('dokumen/mantan-ketua', [InternalController::class, 'leader'])->name('leader');
});

Route::get('masuk', [AuthController::class, 'login'])->name('login');
Route::post('masuk', [AuthController::class, 'verify'])->name('verify');
Route::get('keluar', [AuthController::class, 'logout'])->name('logout');
