<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppoinmentCotroller;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DepartmentController;

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

Route::get('/', [AppoinmentCotroller::class, 'AppoinmentList'])->name('home');
Route::get('/appoinment', [AppoinmentCotroller::class, 'Appoinment'])->name('appoinment');

Route::get('/doctors/add', [DoctorController::class, 'add_doctor'])->name('add_doctor');
Route::post('/doctors/store', [DoctorController::class, 'store_doctor'])->name('store_doctor');
Route::get('/doctors/list', [DoctorController::class, 'all_doctor'])->name('doctors');
Route::get('/doctor/edit/{id}', [DoctorController::class, 'edit_doctor']);
Route::post('/doctor/update', [DoctorController::class, 'update_doctor'])->name('update_doctor');
Route::get('/doctor/delete/{id}', [DoctorController::class, 'delete_doctor']);

Route::get('get_doctor_departmenr_wise', [DepartmentController::class, 'get_doctor_departmenr_wise'])->name('get_doctor_departmenr_wise');
Route::get('get_doctor_available', [DoctorController::class, 'doctor_available'])->name('get_doctor_available');
Route::get('add_appointment', [AppoinmentCotroller::class, 'add_appointment'])->name('add_appointment');
