<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BookingController;
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

/**
 * password vừa chữ vừa số
 */

Route::pattern('id', '[0-9]+');
Route::pattern('slug', ('.*'));

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/booking_meeting_room', function () {
//     return view('booking_meeting_room');
// });

// Route::prefix('/')->group(function () {
//     Route::get('/', [HomeController::class, 'index'])->name('home.index');
//     Route::match(['get', 'post'], '/book/{id}', [HomeController::class, 'book'])->name('home.book');
// });

// Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');
Route::prefix('/admin')->group(function () {
    //User
    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'userIndex'])->name('admin.index');
        Route::match(['get', 'post'], '/add', [UserController::class, 'addUser'])->name('addUser');
        Route::get('edit/{id}', [UserController::class, 'showEditUser'])->name('editUser');
        Route::post('update/{id}', [UserController::class, 'updateUser'])->name('updateUser');
        Route::get('delete/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
    });
    //Department
    Route::prefix('/department')->group(function () {
        Route::get('/', [DepartmentController::class, 'departmentIndex'])->name('department.index');
        Route::match(['get', 'post'], '/add', [DepartmentController::class, 'addDepartment'])->name('addDepartment');
        Route::get('edit/{id}', [DepartmentController::class, 'showEditDepartment'])->name('editDepartment');
        Route::post('update/{id}', [DepartmentController::class, 'updateDepartment'])->name('updateDepartment');
        Route::get('delete/{id}', [DepartmentController::class, 'deleteDepartment'])->name('deleteDepartment');
    });
    //Position
    Route::prefix('/position')->group(function () {
        Route::get('/', [PositionController::class, 'positionIndex'])->name('position.index');
        Route::match(['get', 'post'], '/add', [PositionController::class, 'addPosition'])->name('addPosition');
        Route::get('edit/{id}', [PositionController::class, 'showEditPosition'])->name('editPosition');
        Route::post('update/{id}', [PositionController::class, 'updatePosition'])->name('updatePosition');
        Route::get('delete/{id}', [PositionController::class, 'deletePosition'])->name('deletePosition');
    });
    //Room
    Route::prefix('/room')->group(function () {
        Route::get('/', [RoomController::class, 'roomIndex'])->name('room.index');
        Route::match(['get', 'post'], '/add', [RoomController::class, 'addRoom'])->name('addRoom');
        Route::get('edit/{id}', [RoomController::class, 'showEditRoom'])->name('editRoom');
        Route::post('update/{id}', [RoomController::class, 'updateRoom'])->name('updateRoom');
        Route::get('delete/{id}', [RoomController::class, 'deleteRoom'])->name('deleteRoom');
    });
    //Booking
    Route::prefix('/booking')->group(function () {
        Route::get('/', [BookingController::class, 'bookingIndex'])->name('booking.index');
        Route::match(['get', 'post'], '/add', [BookingController::class, 'addBooking'])->name('addBooking');
        Route::get('edit/{id}', [BookingController::class, 'showEditBooking'])->name('editBooking');
        Route::post('update/{id}', [BookingController::class, 'updateBooking'])->name('updateBooking');
        Route::get('delete/{id}', [BookingController::class, 'deleteBooking'])->name('deleteBooking');
    });
});
