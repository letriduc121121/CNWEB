<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');

// Hiển thị form tạo task mới
Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');

// Lưu task mới vào cơ sở dữ liệu
Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');

// Hiển thị chi tiết của task
Route::get('tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

// Hiển thị form chỉnh sửa task
Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

// Cập nhật thông tin của task
Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

// Xoá một task
Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');