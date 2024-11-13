<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// dapatkan semua data employee
Route::get('/employees', [EmployeeController::class, 'index']);

// tambahkan data employee
Route::post('/employees', [EmployeeController::class, 'store']);

// dapatkan detail employee
Route::get('/employees/{id}', [EmployeeController::class, 'show']);

// edit data employee
Route::put('/employees/{id}', [EmployeeController::class, 'update']);

// hapus data employee
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);

// cari data berdasarkan nama employee
Route::get('/employees/search/{name}', [EmployeeController::class, 'search']);

// dapatkan data epmloyee yang aktif
Route::get('/employees/status/active', [EmployeeController::class, 'active']);

// dapatkan data epmloyee yang tidka aktif
Route::get('/employees/status/inactive', [EmployeeController::class, 'inactive']);

// dapatkan data epmloyee yang terminated(dipecat)
Route::get('/employees/status/terminated', [EmployeeController::class, 'terminated']);
