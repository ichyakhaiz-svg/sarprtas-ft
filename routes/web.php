<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SuratPermohonanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\MaintenanceChecklistController;
use App\Http\Controllers\BeritaAcaraController;
use App\Http\Controllers\BuatSuratPermohonanController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
)->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| BARANG
|--------------------------------------------------------------------------
*/

Route::get(
    '/barang/pdf',
    [BarangController::class, 'pdf']
);

Route::resource(
    'barang',
    BarangController::class
)->middleware(['auth']);

Route::get(
    '/barang/qrcode/{id}',
    [BarangController::class, 'qrcode']
);

Route::get(
    '/barang/kartu/{id}',
    [BarangController::class, 'kartu']
);

Route::get(
    '/scan',
    function () {
        return view('scan.index');
    }
);

Route::resource(
    'barang',
    BarangController::class
)->middleware(['auth']);

/*
|--------------------------------------------------------------------------
| SURAT PERMOHONAN
|--------------------------------------------------------------------------
*/

Route::get(
    '/surat-permohonan',
    [SuratPermohonanController::class, 'index']
);

Route::get(
    '/surat-permohonan/create',
    [SuratPermohonanController::class, 'create']
);

Route::post(
    '/surat-permohonan/store',
    [SuratPermohonanController::class, 'store']
);

Route::get(
    '/surat-permohonan/edit/{id}',
    [SuratPermohonanController::class, 'edit']
);

Route::post(
    '/surat-permohonan/update/{id}',
    [SuratPermohonanController::class, 'update']
);

Route::get(
    '/surat-permohonan/delete/{id}',
    [SuratPermohonanController::class, 'destroy']
);

/*
|--------------------------------------------------------------------------
| Buat Surat Permohonan
|--------------------------------------------------------------------------
*/
Route::get(
    '/buat-surat-permohonan/create',
    [BuatSuratPermohonanController::class, 'create']
);

Route::post(
    '/buat-surat-permohonan/generate',
    [BuatSuratPermohonanController::class, 'generate']
);

Route::get(
    '/buat-surat-permohonan',
    [BuatSuratPermohonanController::class, 'index']
);

/*
|--------------------------------------------------------------------------
| Berita Acara
|--------------------------------------------------------------------------
*/
Route::get(
    '/berita-acara',
    [BeritaAcaraController::class, 'index']
);

Route::get(
    '/berita-acara/create',
    [BeritaAcaraController::class, 'create']
);

Route::post(
    '/berita-acara/store',
    [BeritaAcaraController::class, 'store']
);

Route::get(
    '/berita-acara/edit/{id}',
    [BeritaAcaraController::class, 'edit']
);

Route::post(
    '/berita-acara/update/{id}',
    [BeritaAcaraController::class, 'update']
);

Route::get(
    '/berita-acara/delete/{id}',
    [BeritaAcaraController::class, 'destroy']
);

/*
|--------------------------------------------------------------------------
| MASTER DATA
|--------------------------------------------------------------------------
*/

Route::resource(
    'merk',
    MerkController::class
)->middleware(['auth']);

Route::resource(
    'kategori',
    KategoriController::class
)->middleware(['auth']);

Route::resource(
    'lokasi',
    LokasiController::class
)->middleware(['auth']);

Route::resource(
    'status',
    StatusController::class
)->middleware(['auth']);





/*
|--------------------------------------------------------------------------
| PEMINJAMAN
|--------------------------------------------------------------------------
*/

Route::get(
    '/peminjaman/kembalikan/{id}',
    [PeminjamanController::class, 'kembalikan']
);

Route::resource(
    'peminjaman',
    PeminjamanController::class
);

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

});

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Import
|--------------------------------------------------------------------------
*/

Route::post(
    '/barang/import',
    [BarangController::class, 'import']
)->middleware(['auth']);


Route::middleware(['auth'])->group(function () {

    Route::resource(
        'barang',
        BarangController::class
    );

    Route::resource(
        'peminjaman',
        PeminjamanController::class
    );

});

/*
|--------------------------------------------------------------------------
| laporan
|--------------------------------------------------------------------------
*/

Route::get('/laporan', [LaporanController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Pemeliharaan
|--------------------------------------------------------------------------
*/

Route::resource(
    'pemeliharaan',
    PemeliharaanController::class
);

Route::resource(
    'checklist-maintenance',
    MaintenanceChecklistController::class
);

/*
|--------------------------------------------------------------------------
| Detail Barang
|--------------------------------------------------------------------------
*/

Route::get(
    '/barang/{id}',
    [BarangController::class, 'show']
)->name('barang.show');

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

Route::get(
    '/forgot-password',
    function () {
        return view('auth.forgot-password');
    }
);

Route::resource(
    'user',
    UserController::class
);

Route::get(
    '/user/reset-password/{id}',
    [UserController::class,
    'resetPassword']
);

Route::post(
    '/profile/password',
    [ProfileController::class, 'updatePassword']
)->name('profile.password');