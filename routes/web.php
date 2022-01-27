<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');
Route::get('/lol', [AdminController::class, 'showappointment']);
Route::get('/show_doctors', [AdminController::class, 'show_doctors']);
Route::get('/delete_doctor/{id}', [AdminController::class, 'delete_doctor']);
Route::get('/emailview/{id}', [AdminController::class, 'emailview']);

Route::post('/sendemail/{id}', [AdminController::class, 'sendemail']);

Route::get('/update_doctor/{id}', [AdminController::class, 'update_doctor']);
Route::post('/editdoctor/{id}', [AdminController::class, 'editdoctor']);




Route::get('/approved/{id}', [AdminController::class, 'approved']);
Route::get('/canceled/{id}', [AdminController::class, 'canceled']);


Route::get('/add_doctor_view', [AdminController::class, 'addview']);
Route::post('/upload_doctor', [AdminController::class, 'upload']);
Route::post('/appoitment', [HomeController::class, 'appoitment']);
Route::get('/myappoitment', [HomeController::class, 'myappoitment']);
Route::get('/appointment_delete/{id}', [HomeController::class, 'appointment_delete']);





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
