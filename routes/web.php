<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\LoginController;
use App\Http\Controllers\Admin\AdminController;
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
Route::pattern('id', '[0-9]+');
Route::pattern('slug', ('.*'));

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/booking_meeting_room', function () {
    return view('booking_meeting_room');
});

Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::match(['get', 'post'], '/book/{id}', [HomeController::class, 'book'])->name('home.book');
});

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Admin
Route::get('/admin/login', [AdminController::class, 'showLoginAdmin'])->name('get.admin.login');
Route::post('/admin/login', [AdminController::class, 'loginAdmin'])->name('post.admin.login');
Route::get('/booking_meeting_room', [AdminController::class, 'adminBooking']);
Route::get('/admin/user/index', [AdminController::class, 'adminIndex'])->name('get.admin.index');
Route::get('/admin/user/add', [AdminController::class, 'showAddUser'])->name('get.admin.add');
Route::post('/admin/user/add', [AdminController::class, 'addUser'])->name('post.admin.add');
Route::get('edit-user/{id}', [AdminController::class, 'showEditUser']);
Route::put('update-user/{id}', [AdminController::class, 'editUser']);
Route::get('delete-user/{id}', [AdminController::class, 'deleteUser']);

