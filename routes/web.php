<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieReviewController;

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
    return redirect()->route('reviews.index');
});

Route::get('/reviews', [MovieReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/create', [MovieReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews', [MovieReviewController::class, 'store'])->name('reviews.store');

