<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembayaransController;
use App\Http\Controllers\PaketsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('public/images/{image}', function($image = null)
{
    $file = Storage::get('imgproduct/' . $image);
    $mimetype = Storage::mimeType('imgproduct/' . $image);
    return response($file, 200)->header('Content-Type', $mimetype);
});

Route::get('/pembayaran', [PembayaransController::class, 'index'])->name('pembayaran');
Route::get('/tambahpembayaran', [PembayaransController::class, 'tambahpembayaran'])->name('tambahpembayaran');
Route::post('/insertdata', [PembayaransController::class, 'insertdata'])->name('insertdata');
Route::get('/ubahpembayaran/{id_pembayaran}', [PembayaransController::class, 'ubahpembayaran'])->name('ubahpembayaran');
Route::post('/updatedata/{id_pembayaran}', [PembayaransController::class, 'updatedata'])->name('updatedata');
Route::get('/deletepembayaran/{id_pembayaran}', [PembayaransController::class, 'deletepembayaran'])->name('deletepembayaran');

Route::get('/paket', [PaketsController::class, 'index'])->name('paket');
Route::get('/tambahpaket', [PaketsController::class, 'tambahpaket'])->name('tambahpaket');
Route::post('/insertdata3', [PaketsController::class, 'insertdata3'])->name('insertdata3');
Route::get('/ubahpaket/{id_paket}', [PaketsController::class, 'ubahpaket'])->name('ubahpaket');
Route::post('/updatedata3/{id_paket}', [PaketsController::class, 'updatedata3'])->name('updatedata3');
Route::get('/deletepaket/{id_paket}', [PaketsController::class, 'deletepaket'])->name('deletepaket');


Route::get('/users', [UsersController::class, 'index'])->name('users');
Route::get('/tambahuser', [UsersController::class, 'tambahuser'])->name('tambahuser');
Route::post('/insertdata2', [UsersController::class, 'insertdata2'])->name('insertdata2');
Route::get('/ubahuser/{id_user}', [UsersController::class, 'ubahuser'])->name('ubahuser');
Route::post('/updatedata2/{id_user}', [UsersController::class, 'updatedata2'])->name('updatedata2');
Route::get('/deleteuser/{id_user}', [UsersController::class, 'deleteuser'])->name('deleteuser');

Route::get('/admins', [AdminsController::class, 'index'])->name('admins');
Route::get('/tambahadmin', [AdminsController::class, 'tambahadmin'])->name('tambahadmin');
Route::post('/insertdata1', [AdminsController::class, 'insertdata1'])->name('insertdata1');
Route::get('/ubahadmin/{id}', [AdminsController::class, 'ubahadmin'])->name('ubahadmin');
Route::post('/updatedata1/{id}', [AdminsController::class, 'updatedata1'])->name('updatedata1');
Route::get('/deleteadmin/{id}', [AdminsController::class, 'deleteadmin'])->name('deleteadmin');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/loginuser', [AuthController::class, 'showLoginForm1'])->name('loginuser');
Route::post('/loginuser', [AuthController::class, 'loginuser']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');