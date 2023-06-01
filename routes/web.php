<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AdminController;
use App\http\Controllers\RoomtypeController;
use App\http\Controllers\RoomController;
use App\http\Controllers\CustomerController;
use App\http\Controllers\StaffDepartment;
use App\http\Controllers\StaffControler;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

//Admin Login
Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'check_login']);
Route::get('admin/logout', [AdminController::class, 'logout']);

//Admin Dashboard
Route::get('admin', function () {
    return view('dashboard');
});

//RoomType Routes
Route::get('admin/roomtype/{id}/delete', [RoomtypeController::class, 'destroy']);
Route::resource('admin/roomtype',RoomtypeController::class);

//Room
Route::get('admin/rooms/{id}/delete', [RoomController::class, 'destroy']);
Route::resource('admin/rooms',RoomController::class);


//Customer
Route::get('admin/customer/{id}/delete', [CustomerController::class, 'destroy']);
Route::resource('admin/customer',CustomerController::class);

//Department
Route::get('admin/department/{id}/delete', [StaffDepartment::class, 'destroy']);
Route::resource('admin/department',StaffDepartment::class);

//Staff
Route::get('admin/staff/{id}/delete', [StaffControler::class, 'destroy']);
Route::resource('admin/staff',StaffControler::class);


//Delete Image
Route::get('admin/roomtypeimage/delete/{id}',[RoomtypeController::class,'destroy_image']);