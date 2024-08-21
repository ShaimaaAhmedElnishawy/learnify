<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Authcontroller;
use App\Http\Controllers\Coursecontroller;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\PaymentController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('user.auth.register');
})->name('register');
Route::get('/login', function () {
    return view('user.auth.login');
})->name('login');
Route::post('/register', [Authcontroller::class, 'register']);
Route::post('/login', [Authcontroller::class, 'login']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/courses', [Coursecontroller::class, 'courses'])->name('courses');
    Route::get('/profile/{id}', [Coursecontroller::class, 'show'])->name('profile');
    Route::view('/success','payment.success');
    Route::view('/cancel','payment.cancel');
    Route::post('/checkout',[PaymentController::class,'checkout']); 
});
//Admin course routes:-
Route::get('/admin_login', function () {
    return view('admin.adminlogin');
})->name('adminlogin');
Route::post('/admin_login', [Admincontroller::class, 'login'])->name('adminlogin.post');
Route::get('/admin/admin_courses', [Admincontroller::class, 'courses'])->name('adminCourses');

Route::get('/admin/create_course', [Admincontroller::class, 'create_course']);
Route::post('/admin/create_course', [Admincontroller::class, 'store_course']);

Route::get('/admin/{id}/edit_course',[Admincontroller::class, 'edit'])->name('edit');
Route::put('/admin/{id}', [Admincontroller::class, 'update']);
Route::delete('/admin/{id}', [Admincontroller::class, 'destroy']);