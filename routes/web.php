<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\CtaController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AuthController;
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

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/', function () {
    // Hero
    $hero = (object) [
        'title' => 'Build Your Digital Solution',
        'subtitle' => 'Icommits IT Consultant Indonesia - AKMI Karya Global',
        'button_text' => 'Konsultasi Sekarang',
        'button_link' => '/contact',
        'image' => null,
    ];

    // Services
    $services = collect([
        (object) ['slug' => 'software-development', 'title' => 'Software Development', 'description' => 'Pengembangan aplikasi berbasis web dan mobile.', 'benefits' => null],
        (object) ['slug' => 'website-cms', 'title' => 'Website CMS', 'description' => 'Pembuatan website company profile dan CMS.', 'benefits' => null],
        (object) ['slug' => 'e-raport', 'title' => 'E-Raport Sekolah', 'description' => 'Sistem raport digital untuk sekolah.', 'benefits' => null],
        (object) ['slug' => 'kehosting', 'title' => 'Kehosting.in', 'description' => 'Layanan domain dan hosting.', 'benefits' => null],
        (object) ['slug' => 'legal-dari-kita', 'title' => 'Legal Dari Kita', 'description' => 'Layanan legalitas usaha dan bisnis.', 'benefits' => null],
        (object) ['slug' => 'training', 'title' => 'Training', 'description' => 'Pelatihan teknologi informasi.', 'benefits' => null],
        (object) ['slug' => 'balanja-id', 'title' => 'Balanja.id', 'description' => 'Platform digital retail modern.', 'benefits' => null],
    ]);

    // Portfolios
    $portfolios = collect([
        (object) ['title' => 'WorkTrack', 'client' => 'PT ABC', 'description' => 'Sistem monitoring pekerjaan karyawan', 'image' => null, 'project_url' => '#'],
        (object) ['title' => 'E-Raport', 'client' => 'SMA Negeri', 'description' => 'Sistem e-raport sekolah', 'image' => null, 'project_url' => '#'],
        (object) ['title' => 'Company Profile', 'client' => 'PT XYZ', 'description' => 'Website profil perusahaan', 'image' => null, 'project_url' => '#'],
        (object) ['title' => 'Inventory System', 'client' => 'PT Logistik', 'description' => 'Sistem manajemen inventori', 'image' => null, 'project_url' => '#'],
        (object) ['title' => 'POS System', 'client' => 'Toko Retail', 'description' => 'Sistem kasir modern', 'image' => null, 'project_url' => '#'],
    ]);

    // Benefits (dummy)
    $benefits = collect([
        (object) ['icon' => 'bi-shield-check', 'title' => 'Keamanan Terjamin', 'description' => 'Menggunakan teknologi secure dan reliabel untuk setiap solusi.'],
        (object) ['icon' => 'bi-handshake', 'title' => 'Kemitraan Strategis', 'description' => 'Bersinergi dengan klien dengan prinsip saling menguntungkan.'],
        (object) ['icon' => 'bi-clock-history', 'title' => 'Cepat & Tepat', 'description' => 'Pekerjaan berkualitas, cepat, tepat, dengan harga kompetitif.'],
        (object) ['icon' => 'bi-trophy', 'title' => 'Produk Lokal Bersaing', 'description' => 'Menghasilkan produk TI dalam negeri yang mampu bersaing global.'],
    ]);

    // Technologies (dummy)
    $technologies = collect([
        (object) ['name' => 'Laravel', 'icon' => 'bi-laptop', 'color' => '#f9322c'],
        (object) ['name' => 'Vue.js', 'icon' => 'bi-braces', 'color' => '#42b883'],
        (object) ['name' => 'Bootstrap', 'icon' => 'bi-bootstrap', 'color' => '#7952b3'],
        (object) ['name' => 'MySQL', 'icon' => 'bi-database', 'color' => '#00758f'],
        (object) ['name' => 'Flutter', 'icon' => 'bi-phone', 'color' => '#02569b'],
        (object) ['name' => 'React', 'icon' => 'bi-file-code', 'color' => '#61dafb'],
    ]);

    // CTA (dummy)
    $cta = (object) [
        'title' => 'Wujudkan Solusi TI Terbaik untuk Bisnis Anda',
        'subtitle' => 'Konsultasikan kebutuhan teknologi informasi Anda dengan tim ahli Icommits.',
        'button_text' => 'Konsultasi Gratis',
        'button_link' => '/contact',
        'background_color' => '#1a1a1a',
        'button_color' => '#f9d342',
    ];

    return view('pages.home', compact('hero', 'services', 'portfolios', 'benefits', 'technologies', 'cta'));
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    // Data kontak (dummy)
    $contact = (object) [
        'address' => 'Jl. Pasir Subur No.10, Ancol, Kec. Regol, Kota Bandung',
        'email' => 'info@icommits.co.id',
        'phone' => '+62 819 9030 0100',
        'whatsapp' => '6281990300100',
        'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.123456!2d107.612345!3d-6.912345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTQnNDQuMyJTIDEwN8KwMzYnNDQuMyJF!5e0!3m2!1sid!2sid!4v1234567890',
        'social_media' => [
            (object) ['platform' => 'Instagram', 'url' => '#', 'icon' => 'bi-instagram'],
            (object) ['platform' => 'LinkedIn', 'url' => '#', 'icon' => 'bi-linkedin'],
            (object) ['platform' => 'YouTube', 'url' => '#', 'icon' => 'bi-youtube'],
            (object) ['platform' => 'Facebook', 'url' => '#', 'icon' => 'bi-facebook'],
        ]
    ];

    return view('pages.contact', compact('contact'));
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Services
    Route::resource('services', ServiceController::class);
    // Portfolios
    Route::resource('portfolios', PortfolioController::class);
    // Hero
    Route::get('hero/{id}/edit', [HeroController::class, 'edit'])->name('hero.edit');
    Route::put('hero/{id}', [HeroController::class, 'update'])->name('hero.update');
    // Benefits
    Route::resource('benefits', BenefitController::class);
    // Technologies
    Route::resource('technologies', TechnologyController::class);
    // CTA
    Route::get('cta/{id}/edit', [CtaController::class, 'edit'])->name('cta.edit');
    Route::put('cta/{id}', [CtaController::class, 'update'])->name('cta.update');
    // Contact
    Route::get('contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('contact/{id}', [ContactController::class, 'update'])->name('contact.update');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');