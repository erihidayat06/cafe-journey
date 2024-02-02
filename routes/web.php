<?php

use App\Models\Beli;
use App\Models\Cafe;
use App\Models\User;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VipController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnalitikController;
use App\Http\Controllers\BuatCafeController;
use App\Http\Controllers\LaporanPDFController;
use App\Http\Controllers\ProfilCafeController;
use App\Http\Controllers\DashboardBeliController;
use App\Http\Controllers\AdminLanggananController;
use App\Http\Controllers\DashboardMinumController;
use App\Http\Controllers\DashboardBookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Hapus Pesanan
$pesanans = Beli::get();
foreach ($pesanans as $pesanan) {
    if (date('Y-m-d', strtotime('+10 days', strtotime($pesanan->updated_at))) <= date('Y-m-d') and $pesanan->no_pesanan != null) {
        Beli::where('no_pesanan', $pesanan->no_pesanan)->delete();
    }
}

// Hapus Cafe
$cafes = Cafe::get();
foreach ($cafes as $cafe) {
    if (date('Y-m-d H:i:s', strtotime('+10 days', strtotime($cafe->updated_at))) <= date('Y-m-d H:i:s') and $cafe->konfirmasi == 'tunggu') {

        Cafe::where('id', $cafe->id)->delete();
    }
}


// Homepage
Route::get('/', [HomeController::class, 'index']);
Route::get('/help', [HomeController::class, 'help']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/cafes', [HomeController::class, 'cafes'])->name('cafes');

// Cafe
Route::get('/cafe/{cafe:slug}', [CafeController::class, 'profil']);
Route::get('/cafe/menu/{cafe:slug}', [CafeController::class, 'menu']);
Route::post('/cafe/menu/{cafe:slug}', [CafeController::class, 'menu']);
Route::get('/cafe/booking/{cafe:slug}', [CafeController::class, 'booking']);
Route::get('/cafe/ulasan/{cafe:slug}', [CafeController::class, 'ulasan']);
Route::get('/cafe/jadwal/{cafe:slug}', [CafeController::class, 'jadwal']);

// User
Route::get('/profil', [ProfilController::class, 'index'])->middleware('auth');
Route::put('/profil/{user:id}', [ProfilController::class, 'update'])->middleware('auth');
Route::get('/beli/draf', [BeliController::class, 'draf']);
Route::delete('/beli/destroy-pesanan/{beli:id}', [BeliController::class, 'destroyPesanan']);
Route::resource('/beli', BeliController::class);
Route::post('/rating', [RatingController::class, 'store']);
Route::resource('booking', BookingController::class);

// Mendaftar Cafe
Route::get('/daftar-cafe', [BuatCafeController::class, 'index'])->middleware('auth');
Route::post('/daftar-cafe', [BuatCafeController::class, 'store'])->middleware('auth');

// Cetak PDF
Route::get('/cetak/{beli:no_pesanan}', [LaporanPDFController::class, 'pesananPDF'])->middleware('auth');
Route::get('/dashboard/cetak/{beli:no_pesanan}', [LaporanPDFController::class, 'pesananPDF'])->middleware('auth');
Route::get('/booking/cetak-booking/{booking:no_pesanan}', [LaporanPDFController::class, 'bookingPDF'])->middleware('auth');
Route::get('/dashboard/booking/cetak-booking/{booking:no_pesanan}', [LaporanPDFController::class, 'bookingPDF'])->middleware('auth');
Route::get('/dashboard/booking/laporan/semua', [LaporanPDFController::class, 'laporanBooking'])->middleware('auth');
Route::get('/dashboard/booking/laporan/tunggu', [LaporanPDFController::class, 'laporanBookingTunggu'])->middleware('auth');
Route::get('/dashboard/booking/laporan/sukses', [LaporanPDFController::class, 'laporanBookingSukses'])->middleware('auth');
Route::get('/dashboard/booking/laporan/selesai', [LaporanPDFController::class, 'laporanBookingSelesai'])->middleware('auth');

// Dasboard
Route::resource('/dashboard/cafe', ProfilCafeController::class)->middleware(['auth', 'verified'])->middleware('admin');
Route::resource('/dashboard/minum', DashboardMinumController::class)->middleware('auth')->middleware('admin');
Route::resource('/dashboard/makanan', MakananController::class)->middleware('auth')->middleware('admin');
Route::resource('/dashboard/vip', VipController::class)->middleware('auth')->middleware('admin');
Route::resource('/dashboard/foto', FotoController::class)->middleware('auth')->middleware('admin');
Route::resource('/dashboard/event', EventController::class)->middleware('auth')->middleware('admin');
Route::put('/dashboard/jadwal/{jadwal}', [JadwalController::class, 'update'])->middleware('admin');
Route::get('/dashboard/booking/semua', [DashboardBookingController::class, 'index'])->middleware('admin');
Route::get('/dashboard/booking/tunggu', [DashboardBookingController::class, 'tunggu'])->middleware('admin');
Route::get('/dashboard/booking/sukses', [DashboardBookingController::class, 'sukses'])->middleware('admin');
Route::get('/dashboard/booking/selesai', [DashboardBookingController::class, 'selesai'])->middleware('admin');
Route::put('/dashboard/booking/{booking}', [DashboardBookingController::class, 'update'])->middleware('admin');
Route::get('/dashboard/beli/', [DashboardBeliController::class, 'index'])->middleware('auth')->middleware('admin');
Route::get('/dashboard/analis', [AnalitikController::class, 'index'])->middleware('auth')->middleware('admin');

// Admin
Route::get('admin', [AdminController::class, 'index']);
Route::get('admin/daftar-cafe/semua', [AdminController::class, 'daftarCafe'])->middleware('auth')->middleware('admin_web');
Route::get('admin/daftar-cafe/tunggu', [AdminController::class, 'daftarCafeTunggu'])->middleware('auth')->middleware('admin_web');
Route::get('admin/daftar-cafe/konfir', [AdminController::class, 'daftarCafeKonfir'])->middleware('auth')->middleware('admin_web');
Route::put('admin/daftar-cafe/{cafe:id}', [AdminController::class, 'konfirmasi'])->middleware('auth')->middleware('admin_web');

// Langganan
Route::get('admin/langganan', [AdminLanggananController::class, 'index'])->middleware('auth')->middleware('admin_web');
Route::get('admin/langganan/satu-minggu', [AdminLanggananController::class, 'satuMinggu'])->middleware('auth')->middleware('admin_web');
Route::get('admin/langganan/konfir', [AdminLanggananController::class, 'daftarCafeKonfir'])->middleware('auth')->middleware('admin_web');
Route::put('admin/langganan/{cafe:id}', [AdminLanggananController::class, 'tambahWaktu'])->middleware('auth')->middleware('admin_web');

// Profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register/create', [RegisterController::class, 'create'])->middleware('guest');

// Route::post('/authenticate', [LoginController::class, 'authenticate']);
// Route::get('/logout', [LoginController::class, 'logout']);

Auth::routes(['verify' => true]);
require __DIR__ . '/auth.php';
