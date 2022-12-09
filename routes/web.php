<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\LanguageController;
use App\Models\Language;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ControlpanelController;
use App\Http\Controllers\CubaistaController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomRegisterController;
use App\Models\Product;
use App\Models\About;
use App\Models\User;

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

/*
Route::get('/initial', function () {        
    $codes = Language::pluck('code')->toArray();   
    return view('mainview.initial',['codes' => $codes]);
})->name('home');*/

Route::get('/initial', function () {        
    $codes = Language::pluck('code')->toArray();
    $random = rand(10000, 99999);
        $im = imagecreatetruecolor(200, 30);
        $white = imagecolorallocate($im, 255, 255, 255);
        $black = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, 200, 29, $white);
        $text = $random;
        $font = './arial.ttf';
        imagettftext($im, 30, 0, 10, 30, $black, $font, $text);
        ob_start();
        imagepng($im);
        $imstr = base64_encode(ob_get_clean());
        imagedestroy($im);   
    return view('mainview.initial',['codes' => $codes,'random' => $random,'data' => $imstr]);
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
    Route::get('/about/{id}/translate', 'translate')->name('about.translate')->middleware(['can:admin','auth']);
    Route::post('/about', 'store')->name('about.store')->middleware(['auth']); 
    Route::post('/about/translate', 'translatestore')->name('about.translatestore')->middleware(['auth']); 
    Route::get('/abouts', 'index')->name('about.index');
    Route::get('/about/{id}/edit', 'edit')->name('about.edit')->middleware(['auth']);
});

Route::get('/aboutus', function () {  
    $about = About::where('active',1)->first();  
    $codes = Language::pluck('code')->toArray();    
    return view('aboutview.about', ['codes' => $codes,'about'=>$about]);
})->name('aboutus');

Route::get('/contact', function () {    
    $codes = Language::pluck('code')->toArray();    
    return view('aboutview.about', ['codes' => $codes]);
})->name('contactus');

/*Control Panel */
Route::controller(ControlpanelController::class)->group(function () {
    Route::get('/control', 'index')->name('control')->middleware(['can:admin','auth']);
});

/*Users  */
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users.index')->middleware(['can:admin','auth']);
});

/*Cubaista*/
Route::controller(CubaistaController::class)->group(function () {

    Route::get('/cubaista', 'index')->name('cubaista.index');
    Route::get('/cubaista/create', 'create')->name('cubaista.create');
    Route::post('/cubaista', 'store')->name('cubaista.store');
});

/*Custom */
Route::controller(CustomRegisterController::class)->group(function () {
    Route::get('/cubaista/mail/{email}', 'mail')->name('custom.mail');
    Route::post('/cubaista/mail/store', 'store')->name('custom.store');
});

/*
$random = rand(10000, 99999);
        $im = imagecreatetruecolor(200, 30);
        $white = imagecolorallocate($im, 255, 255, 255);
        $black = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, 200, 29, $white);
        $text = $random;
        $font = './arial.ttf';
        imagettftext($im, 30, 0, 10, 30, $black, $font, $text);
        ob_start();
        imagepng($im);
        $imstr = base64_encode(ob_get_clean());
        imagedestroy($im);
        
        return view('welcome', array('data' => $imstr,'random' => $random,'local'=> request()->segments(1)[0]));
*/
require __DIR__.'/auth.php';
