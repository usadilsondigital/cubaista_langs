<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\LanguageController;
use App\Models\Language;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    $codes = Language::pluck('code')->toArray();
 
  return redirect('/{locale}/initial');
});

Route::get('/dashboard', function () {
    $codes = Language::pluck('code')->toArray();    
    return view('dashboard', ['codes' => $codes]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/initial', function () {        
    $codes = Language::pluck('code')->toArray();
   
    return view('mainview.initial',['codes' => $codes]);
})->name('home');

/* MODELS */
Route::controller(LanguageController::class)->group(function () {
    Route::get('/language', 'index')->name('language.index')->middleware(['can:admin','auth']);
    Route::post('/language', 'store')->name('language.store')->middleware(['auth']); 
    Route::get('/languages', 'list')->name('language.list');
    Route::get('/language/{id}/edit', 'edit')->name('language.edit')->middleware(['auth']);
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'create')->name('product.create')->middleware(['can:admin','auth']);
    Route::post('/product', 'store')->name('product.store')->middleware(['auth']); 
    Route::get('/products', 'index')->name('product.index');
    Route::get('/product/{id}/edit', 'edit')->name('product.edit')->middleware(['auth']);
});

Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'create')->name('about.create')->middleware(['can:admin','auth']);
    Route::post('/about', 'store')->name('about.store')->middleware(['auth']); 
    Route::get('/abouts', 'index')->name('about.index');
    Route::get('/about/{id}/edit', 'edit')->name('about.edit')->middleware(['auth']);
});

Route::get('/aboutus', function () {    
    $codes = Language::pluck('code')->toArray();    
    return view('aboutview.about', ['codes' => $codes]);
});

Route::get('/contact', function () {    
    $codes = Language::pluck('code')->toArray();    
    return view('aboutview.about', ['codes' => $codes]);
});

require __DIR__.'/auth.php';
