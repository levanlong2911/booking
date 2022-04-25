<?php

// use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Home\LoginUserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->group(function () {
    Route::middleware(['auth:web'])->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home.index');
        Route::match(['get', 'post'], '/book/{id}', [HomeController::class, 'book'])->name('home.book');
    });

    
        Route::match(['get', 'post'], '/login', [LoginUserController::class, 'loginUser'])->name('login');
        Route::post('/logout', [LoginUserController::class, 'logoutUser'])->name('logout.user');
    
});

//User
Route::prefix('/admin')->group(function(){
    Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware(['auth:admin', 'back'])->group(function(){
        //Admin
        Route::prefix('/admin')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('admin.index');
            // Route::get('/add', [UserController::class, 'showAddUser'])->name('user.show.add');
            // Route::post('/add', [UserController::class, 'addUser'])->name('user.add');
            // Route::get('edit/{id}', [UserController::class, 'showEditUser'])->name('user.edit');
            // Route::post('update/{id}', [UserController::class, 'updateUser'])->name('user.update');
            // Route::get('delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
        });
        //User
        Route::prefix('/user')->group(function () {
            Route::get('/', [UserController::class, 'userIndex'])->name('user.index');
            Route::get('/add', [UserController::class, 'showAddUser'])->name('user.show.add');
            Route::post('/add', [UserController::class, 'addUser'])->name('user.add');
            Route::get('edit/{id}', [UserController::class, 'showEditUser'])->name('user.edit');
            Route::post('update/{id}', [UserController::class, 'updateUser'])->name('user.update');
            Route::get('delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
        });
        //Department
        Route::prefix('/department')->group(function () {
            Route::get('/', [DepartmentController::class, 'departmentIndex'])->name('department.index');
            Route::get('/add', [DepartmentController::class, 'showAddDepartment'])->name('department.show.add');
            Route::post('/add', [DepartmentController::class, 'addDepartment'])->name('department.add');
            Route::get('edit/{id}', [DepartmentController::class, 'showEditDepartment'])->name('department.edit');
            Route::post('update/{id}', [DepartmentController::class, 'updateDepartment'])->name('department.update');
            Route::get('delete/{id}', [DepartmentController::class, 'deleteDepartment'])->name('department.delete');
        });
        //Position
        Route::prefix('/position')->group(function () {
            Route::get('/', [PositionController::class, 'positionIndex'])->name('position.index');
            Route::get('/add', [PositionController::class, 'showAddPosition'])->name('position.show.add');
            Route::post('/add', [PositionController::class, 'addPosition'])->name('position.add');
            Route::get('edit/{id}', [PositionController::class, 'showEditPosition'])->name('position.edit');
            Route::post('update/{id}', [PositionController::class, 'updatePosition'])->name('position.update');
            Route::get('delete/{id}', [PositionController::class, 'deletePosition'])->name('position.delete');
        });
        //Room
        Route::prefix('/room')->group(function () {
            Route::get('/', [RoomController::class, 'roomIndex'])->name('room.index');
            Route::get('/add', [RoomController::class, 'showAddRoom'])->name('room.show.add');
            Route::post('/add', [RoomController::class, 'addRoom'])->name('room.add');
            Route::get('edit/{id}', [RoomController::class, 'showEditRoom'])->name('room.edit');
            Route::post('update/{id}', [RoomController::class, 'updateRoom'])->name('room.update');
            Route::get('delete/{id}', [RoomController::class, 'deleteRoom'])->name('room.delete');
        });
        //Booking
        Route::prefix('/booking')->group(function () {
            Route::get('/', [BookingController::class, 'bookingIndex'])->name('booking.index');
            Route::get('/add', [BookingController::class, 'showAddBooking'])->name('booking.show.add');
            Route::post('/add', [BookingController::class, 'addBooking'])->name('booking.add');
            Route::get('edit/{id}', [BookingController::class, 'showEditBooking'])->name('booking.edit');
            Route::post('update/{id}', [BookingController::class, 'updateBooking'])->name('booking.update');
            Route::get('delete/{id}', [BookingController::class, 'deleteBooking'])->name('booking.delete');
        });
    });
});

// // Route::match(['get', 'post'], '/login', [LoginUserController::class, 'loginUser'])->name('login');
// Route::post('/logout', [LoginUserController::class, 'logoutUser'])->name('logout.user');
// Route::prefix('/admin')->group(function () {
//     //User
//     Route::prefix('/user')->group(function () {
//         Route::get('/', [UserController::class, 'userIndex'])->name('user.index');
//         Route::get('/add', [UserController::class, 'showAddUser'])->name('user.show.add');
//         Route::post('/add', [UserController::class, 'addUser'])->name('user.add');
//         Route::get('edit/{id}', [UserController::class, 'showEditUser'])->name('user.edit');
//         Route::post('update/{id}', [UserController::class, 'updateUser'])->name('user.update');
//         Route::get('delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
//     });
//     //Department
//     Route::prefix('/department')->group(function () {
//         Route::get('/', [DepartmentController::class, 'departmentIndex'])->name('department.index');
//         Route::get('/add', [DepartmentController::class, 'showAddDepartment'])->name('department.show.add');
//         Route::post('/add', [DepartmentController::class, 'addDepartment'])->name('department.add');
//         Route::get('edit/{id}', [DepartmentController::class, 'showEditDepartment'])->name('department.edit');
//         Route::post('update/{id}', [DepartmentController::class, 'updateDepartment'])->name('department.update');
//         Route::get('delete/{id}', [DepartmentController::class, 'deleteDepartment'])->name('department.delete');
//     });
//     //Position
//     Route::prefix('/position')->group(function () {
//         Route::get('/', [PositionController::class, 'positionIndex'])->name('position.index');
//         Route::get('/add', [PositionController::class, 'showAddPosition'])->name('position.show.add');
//         Route::post('/add', [PositionController::class, 'addPosition'])->name('position.add');
//         Route::get('edit/{id}', [PositionController::class, 'showEditPosition'])->name('position.edit');
//         Route::post('update/{id}', [PositionController::class, 'updatePosition'])->name('position.update');
//         Route::get('delete/{id}', [PositionController::class, 'deletePosition'])->name('position.delete');
//     });
//     //Room
//     Route::prefix('/room')->group(function () {
//         Route::get('/', [RoomController::class, 'roomIndex'])->name('room.index');
//         Route::get('/add', [RoomController::class, 'showAddRoom'])->name('room.show.add');
//         Route::post('/add', [RoomController::class, 'addRoom'])->name('room.add');
//         Route::get('edit/{id}', [RoomController::class, 'showEditRoom'])->name('room.edit');
//         Route::post('update/{id}', [RoomController::class, 'updateRoom'])->name('room.update');
//         Route::get('delete/{id}', [RoomController::class, 'deleteRoom'])->name('room.delete');
//     });
//     //Booking
//     Route::prefix('/booking')->group(function () {
//         Route::get('/', [BookingController::class, 'bookingIndex'])->name('booking.index');
//         Route::get('/add', [BookingController::class, 'showAddBooking'])->name('booking.show.add');
//         Route::post('/add', [BookingController::class, 'addBooking'])->name('booking.add');
//         Route::get('edit/{id}', [BookingController::class, 'showEditBooking'])->name('booking.edit');
//         Route::post('update/{id}', [BookingController::class, 'updateBooking'])->name('booking.update');
//         Route::get('delete/{id}', [BookingController::class, 'deleteBooking'])->name('booking.delete');
//     });
// });
