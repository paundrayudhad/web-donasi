<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
//Route ini berfungsi untuk mempilkan artikel yang ada 
Route::get('/artikel', [ArticleController::class, 'index'])->name('article.index');

//Membuat route baru untuk menampilkan artikel berdasarkan slug
//slug di gunakan untuk mengambil data artikel yang di inginkan dengan parameter slug
//semisal artikel yang di inginkan adalah artikel yang memiliki slug 'judul-artikel'

Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign.index');
Route::get('/campaign/{slug}', [CampaignController::class, 'show'])->name('campaign.show');
Route::get('/campaign/{slug}/donation', [CampaignController::class, 'donation'])->name('campaign.donation');
Route::post('/campaign/{slug}/donation', [CampaignController::class, 'storeDonation'])->name('campaign.storeDonation');
Route::get('/donation-success', [CampaignController::class, 'success'])->name('campaign.success');
