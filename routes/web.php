<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController; 
use App\Http\Controllers\StudentController; 
use App\Models\User;

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;


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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('send-email', function () {
    // $user = User::first();
    // $user->sendEmailVerificationNotification();
    // dd($user);
    $data = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
    Mail::to('sunilsharmahindu456@gmail.com')->send(new TestEmail($data));
});





Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('loginpost', [UserController::class, 'loginpost'])->name('loginpost');
Route::get('registration', [UserController::class, 'registration'])->name('registration');
Route::post('registrationpost', [UserController::class, 'registrationpost'])->name('registrationpost');


Route::group(['middleware' => 'auth'], function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::resource('product', ProductController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
    Route::resource('page', PageController::class);
    Route::resource('block', BlockController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('banner', BannerController::class);
    Route::get('student', [StudentController::class, 'index'])->name('student');
});

Route::get('home', [WebsiteController::class, 'homepage'])->name('homepage');
// Route::get('home/mencologne', [WebsiteController::class, 'mencologne'])->name('mencologne');

Route::get('collection/{slug}', [WebsiteController::class, 'categoryList'])->name('category-list');
Route::get('article/{slug}', [WebsiteController::class, 'articleList'])->name('article-list');

Route::post('cart/{id}', [CartController::class, 'store'])->name('cart');
Route::get('totalcart', [CartController::class, 'addcart'])->name('totalcart');
