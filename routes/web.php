<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AdminController;
use App\http\Controllers\RoomtypeController;
use App\http\Controllers\RoomController;
use App\http\Controllers\CustomerController;
use App\http\Controllers\StaffDepartment;
use App\http\Controllers\StaffControler;
use App\http\Controllers\BookingController;
use App\http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'home']);

//Admin Login
Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'check_login']);
Route::get('admin/logout', [AdminController::class, 'logout']);

//Admin Dashboard

Route::get('admin', [AdminController::class, 'dashboard']);

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

//StaffPayment
Route::get('admin/staff/payments/{id}',[StaffControler::class,'all_payments']);
Route::get('admin/staff/payment/{id}/add',[StaffControler::class,'add_payment']);
Route::post('admin/staff/payment/{id}',[StaffControler::class,'save_payment']);
Route::get('admin/staff/payment/{id}/{staff_id}/delete',[StaffControler::class,'delete_payment']);

//StaffCRUD
Route::get('admin/staff/{id}/delete', [StaffControler::class, 'destroy']);
Route::resource('admin/staff',StaffControler::class);


//Delete Image
Route::get('admin/roomtypeimage/delete/{id}',[RoomtypeController::class,'destroy_image']);

//Booking
Route::get('admin/booking/{id}/delete', [BookingController::class, 'destroy']);
Route::get('admin/booking/available-rooms/{checkin_date}', [BookingController::class, 'available_rooms']);
Route::resource('admin/booking',BookingController::class);
