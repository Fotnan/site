<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $images = DB::table('multipics')->get();
    $images_app = DB::table('multipics')->where('slug', '=','app')->get();
    $images_web = DB::table('multipics')->where('slug', '=','web')->get();
    $images_card = DB::table('multipics')->where('slug', '=','card')->get();
    return view('home', compact('brands', 'abouts', 'images', 'images_app', 'images_web', 'images_card'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');


// Multi Image Route
Route::get('/multi/image', [BrandController::class, 'Multpic'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');

//Admin ALL Route
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [HomeController::class, 'Edit']);
Route::post('/slider/update/{id}', [HomeController::class, 'Update']);
Route::get('/slider/delete/{id}', [HomeController::class, 'Delete']);

//Home About All Route
Route::get('/home/About', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/About', [AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/About', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);
Route::post('update/homeabout/{id}', [AboutController::class, 'UpdateAbout']);
Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);

//Portfolio route
Route::get('/portfolio', [AboutController::class, 'Portfolio'])->name('portfolio');

//Admin Contact Page Route
Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/add/contact', [ContactController::class, 'AdminAddContact'])->name('add.contact');
Route::post('/admin/store/Contact', [ContactController::class, 'AdminStoreContact'])->name('store.contact');
Route::get('/contact/edit/{id}', [ContactController::class, 'EditContact']);
Route::post('update/contact/{id}', [ContactController::class, 'UpdateContact']);
Route::get('/contact/delete/{id}', [ContactController::class, 'DeleteContact']);
Route::get('/admin/message', [ContactController::class, 'AdminMessage'])->name('admin.message');
Route::get('/message/delete/{id}', [ContactController::class, 'DeleteMessage']);

//Home Contact Page Route
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');
Route::post('/contact/form', [ContactController::class, 'ContactForm'])->name('contact.form');
