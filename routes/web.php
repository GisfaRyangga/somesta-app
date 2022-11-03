<?php

use App\Http\Controllers\FirebaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SomestaController;
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

// Route::get('/', function () {
//     return view('login', [
//         'title' => 'login'
//     ]);
// });

// Route::get('/register', function () {
//     return view('register', [
//         'title' => 'register'
//     ]);
// });

// Route::get('/form', function () {
//     return view('form', [
//         'title' => 'form'
//     ]);
// });

// Route::get('/upload', function () {
//     return view('upload', [
//         'title' => 'upload'
//     ]);
// });

// Route::get('/show', function () {
//     return view('show', [
//         'title' => 'show'
//     ]);
// });

Route::get('/', [SomestaController::class, 'tampil_login']);
Route::get('/add_admin', [SomestaController::class, 'tampil_register']);
Route::get('/form', [SomestaController::class, 'tampil_form']);
Route::get('/uploadcsv', [SomestaController::class, 'tampil_csv']);

Route::get('/edit/{id}', [FirebaseController::class, 'edit'])->name('edit.perusahaan');
Route::post('/edit/{id}/update', [FirebaseController::class, 'updateThisPerusahaan'])->name('update.perusahaan');

// Route::get('/show', [SomestaController::class, 'tampil_show']);
Route::get('/show', [FirebaseController::class, 'read']);

//form route
Route::post('/submitForm', [FirebaseController::class, 'set'])->name('perusahaan.submitForm');

Route::get('/delete/{id}', [FirebaseController::class, 'delete'])->name('delete.perusahaan');

// firebase crud
// Route::get('create', [FirebaseController::class, 'set']);
Route::get('read', [FirebaseController::class, 'read']);
// Route::get('update', [FirebaseController::class, 'update']);
// Route::get('delete', [FirebaseController::class, 'delete']);
