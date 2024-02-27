<?php

use App\Http\Controllers\curriculaController;
use App\Http\Controllers\expenseController;
use App\Http\Controllers\levelofeducationController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPaymentController;
use App\Http\Controllers\StudentScoreController;
use App\Http\Controllers\teacherController;

// Route::get('/', function () {
//     return view('index');
// })->name('dashbords');


Route::get('/', [ReportController::class, 'show'])->name('dashboard.report');




Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}',[StudentController::class, 'update'])->name('students.update');


Route::get('/studentScore', [StudentScoreController::class, 'index'])->name('scores.index');
Route::get('/studentScore/create', [StudentScoreController::class, 'create'])->name('scores.create');
Route::post('/studentScore', [StudentScoreController::class, 'store'])->name('scores.store');
Route::delete('/studentScore/{id}', [StudentScoreController::class, 'destroy'])->name('scores.destroy');
Route::get('/studentScore/{id}/edit', [StudentScoreController::class, 'edit'])->name('scores.edit');
Route::put('/studentScore/{id}', [StudentScoreController::class, 'update'])->name('scores.update');


Route::get('/teachers', [teacherController::class, 'index'])->name('teachers.index');
Route::get('/teachers/create', [teacherController::class, 'create'])->name('teachers.create');
Route::post('/teachers', [teacherController::class, 'store'])->name('teachers.store');
Route::delete('/teachers/{id}', [teacherController::class, 'destroy'])->name('teachers.destroy');
Route::get('/teachers/{id}/edit', [teacherController::class, 'edit'])->name('teachers.edit');
Route::put('/teachers/{id}', [teacherController::class, 'update'])->name('teachers.update');

Route::get('/curriculas', [curriculaController::class, 'index'])->name('curriculas.index');
Route::get('/curriculas/create', [curriculaController::class, 'create'])->name('curriculas.create');
Route::post('/curriculas', [curriculaController::class, 'store'])->name('curriculas.store');
Route::delete('/curriculas/{id}', [curriculaController::class, 'destroy'])->name('curriculas.destroy');
Route::get('/curriculas/{id}/edit', [curriculaController::class, 'edit'])->name('curriculas.edit');
Route::put('/curriculas/{id}',[curriculaController::class, 'update'])->name('curriculas.update');


Route::get('/levelofeducations', [levelofeducationController::class, 'index'])->name('levelofeducations.index');
Route::get('/levelofeducations/create', [levelofeducationController::class, 'create'])->name('levelofeducations.create');
Route::post('/levelofeducations', [levelofeducationController::class, 'store'])->name('levelofeducations.store');
Route::delete('/levelofeducations/{id}', [levelofeducationController::class, 'destroy'])->name('levelofeducations.destroy');
Route::get('/levelofeducations/{id}/edit', [levelofeducationController::class, 'edit'])->name('levelofeducations.edit');
Route::put('/levelofeducations/{id}',[levelofeducationController::class, 'update'])->name('levelofeducations.update');


Route::get('/expenses', [expenseController::class, 'index'])->name('expenses.index');
Route::get('/expenses/create', [expenseController::class, 'create'])->name('expenses.create');
Route::post('/expenses', [expenseController::class, 'store'])->name('expenses.store');
Route::delete('/expenses/{id}', [expenseController::class, 'destroy'])->name('expenses.destroy');
Route::get('/expenses/{id}/edit', [expenseController::class, 'edit'])->name('expenses.edit');
Route::put('/expenses/{id}',[expenseController::class, 'update'])->name('expenses.update');



Route::get('/studentPayment', [StudentPaymentController::class, 'index'])->name('studentPayment.index');
Route::get('/studentPayment/create', [StudentPaymentController::class, 'create'])->name('studentPayment.create');
Route::post('/studentPayment', [StudentPaymentController::class, 'store'])->name('studentPayment.store');
Route::delete('/studentPayment/{id}', [StudentPaymentController::class, 'destroy'])->name('studentPayment.destroy');
Route::get('/studentPayment/{id}/edit', [StudentPaymentController::class, 'edit'])->name('studentPayment.edit');
Route::put('/studentPayment/{id}',[StudentPaymentController::class, 'update'])->name('studentPayment.update');
