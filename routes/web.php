<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasSiagaController;
use App\Http\Controllers\CekKondisiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KesiapsiagaanController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\PertolonganController;
use App\Http\Controllers\KonsultasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = \Illuminate\Support\Facades\Auth::user();
    $skorTerbaru = \App\Models\PreparednessScore::where('user_id', $user->id)->first();

    if ($user->role === 'perawat') {
        $antrean = [
            (object) ['nama' => 'Supardi', 'keluhan' => 'Demam 3 hari', 'waktu' => '09:15'],
            (object) ['nama' => 'Siti Aminah', 'keluhan' => 'Sesak napas', 'waktu' => '10:30'],
        ];
        return view('dashboard-perawat', compact('antrean'));
    } 
    
    if ($user->role === 'admin') {
        $totalUser = \App\Models\User::count();
        $totalPengguna = \App\Models\User::where('role', 'pengguna')->count();
        $totalPerawat = \App\Models\User::where('role', 'perawat')->count();
        return view('dashboard-admin', compact('totalUser', 'totalPengguna', 'totalPerawat'));
    }

    return view('dashboard', compact('skorTerbaru'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/profil', [ProfilController::class, 'index'])->middleware(['auth', 'verified'])->name('profil');

Route::get('/edukasi', [EdukasiController::class, 'index'])->middleware(['auth', 'verified'])->name('edukasi.index');
Route::get('/edukasi/{slug}', [EdukasiController::class, 'show'])->middleware(['auth', 'verified'])->name('edukasi.show');

Route::get('/cek-kondisi', [CekKondisiController::class, 'index'])->middleware(['auth', 'verified'])->name('cek-kondisi');
Route::post('/cek-kondisi/store', [CekKondisiController::class, 'store'])->middleware(['auth', 'verified'])->name('cek-kondisi.store');

Route::get('/konsultasi', [KonsultasiController::class, 'index'])->middleware(['auth'])->name('konsultasi.index');
Route::get('/konsultasi/jenis', [KonsultasiController::class, 'jenis'])->middleware(['auth'])->name('konsultasi.jenis');
Route::get('/konsultasi/mulai', [KonsultasiController::class, 'form'])->middleware(['auth'])->name('konsultasi.mulai');
Route::get('/konsultasi/riwayat', [KonsultasiController::class, 'riwayat'])->middleware(['auth'])->name('konsultasi.riwayat');
Route::post('/konsultasi/start', [KonsultasiController::class, 'start'])->middleware(['auth'])->name('konsultasi.start');
Route::get('/konsultasi/chat/{id}', [KonsultasiController::class, 'showChat'])->middleware(['auth'])->name('konsultasi.chat');
Route::get('/konsultasi/{id}/messages', [KonsultasiController::class, 'getMessages'])->middleware(['auth'])->name('konsultasi.messages');
Route::post('/konsultasi/{id}/send', [KonsultasiController::class, 'sendMessage'])->middleware(['auth'])->name('konsultasi.send');
Route::get('/konsultasi/{id}/status', [KonsultasiController::class, 'checkStatus'])->middleware(['auth'])->name('konsultasi.status');
Route::post('/konsultasi/{id}/finish', [KonsultasiController::class, 'finish'])->middleware(['auth'])->name('konsultasi.finish');

Route::get('/pertolongan', [PertolonganController::class, 'index'])->middleware(['auth', 'verified'])->name('pertolongan.index');
Route::get('/pertolongan/{slug}', [PertolonganController::class, 'show'])->middleware(['auth', 'verified'])->name('pertolongan.show');

Route::get('/kesiapsiagaan', [KesiapsiagaanController::class, 'index'])->middleware(['auth', 'verified'])->name('kesiapsiagaan');
Route::post('/kesiapsiagaan/store', [KesiapsiagaanController::class, 'store'])->middleware(['auth', 'verified'])->name('kesiapsiagaan.store');

Route::get('/tas-siaga', [TasSiagaController::class, 'index'])->middleware(['auth', 'verified'])->name('tas-siaga');
Route::post('/tas-siaga/update', [TasSiagaController::class, 'update'])->middleware(['auth', 'verified'])->name('tas-siaga.update');

Route::get('/perawat/antrean', [PerawatController::class, 'antrean'])->middleware(['auth', 'verified'])->name('perawat.antrean');
Route::get('/perawat/chat/{id}', [PerawatController::class, 'chat'])->middleware(['auth', 'verified'])->name('perawat.chat');
Route::post('/perawat/chat/{id}/finish', [PerawatController::class, 'finish'])->middleware(['auth', 'verified'])->name('perawat.finish');

require __DIR__.'/auth.php';