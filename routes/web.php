<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashbordcontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\resultcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [dashbordcontroller::class, 'home'])->name('home');

// Registration
Route::get('/register', [dashbordcontroller::class, 'showregister'])->name('register');
Route::post('/register', [dashbordcontroller::class, 'store']);
Route::get('/Data', [DashbordController::class, 'viewregistar']);

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login_process', [LoginController::class, 'loginProcess'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//change-password
Route::get('/change-password', [LoginController::class, 'changePasswordForm'])->middleware('auth')->name('change.password.form');
Route::post('/change-password', [LoginController::class, 'changePassword'])->middleware('auth')->name('change.password');


// Dashboard
Route::get('/dashbord', [dashbordcontroller::class, 'dashbord'])->name('dashbord');

// Add Student
Route::get('/addstudent', [dashbordcontroller::class, 'addstudent'])->name('addstudent');
Route::post('/InsertStudent', [dashbordcontroller::class, 'InsertStudent'])->name('InsertStudent');
Route::get('/viewstudent', [dashbordcontroller::class, 'viewstudent'])->name('viewstudent');
Route::get('/viewstudent/edit/{id}', [dashbordcontroller::class, 'EditStudent'])->name('editstudent');
Route::put('/viewstudent/update/{id}', [dashbordcontroller::class, 'UpdateStudent'])->name('updateStudent');
Route::get('/viewstudent/delete/{id}', [dashbordcontroller::class, 'DeleteStudent'])->name('DeleteStudent');


// Add Result
Route::get('/addresult', [resultcontroller::class, 'addresult'])->name('addresult');
Route::post('/InsertResult', [resultcontroller::class, 'InsertResult'])->name('InsertResult');
Route::get('/viewresult', [resultcontroller::class, 'viewresult'])->name('viewresult');
Route::get('/viewresult/edit/{id}', [resultcontroller::class, 'EditResult'])->name('editresult');
Route::put('/viewresult/update/{id}', [resultcontroller::class, 'UpdateResult'])->name('UpdateResult');
Route::get('/viewresult/delete/{id}', [resultcontroller::class, 'DeleteResult'])->name('DeleteResult');

// display result
Route::get('/result', [ResultController::class, 'showForm'])->name('showForm');;
Route::post('/result', [ResultController::class, 'fetchResult']);
