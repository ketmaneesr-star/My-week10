<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "เชื่อมต่อฐานข้อมูลสำเร็จ! Database name: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "ไม่สามารถเชื่อมต่อฐานข้อมูลได้: " . $e->getMessage();
    }
});

Route::get('/', function () {
    return View("index");
});

Route::get('/about', function () {
    return View("about");
});


Route::get('/blog', function () {
    return View("blog");
});

Route::get('/abouts',[AdminController::class,"about"] )->name("abouts");
Route::get('/blogs',[AdminController::class,"blog"] )->name("blogs");
Route::get('/create',[AdminController::class,"create"] )->name("create");
Route::post('/insert',[AdminController::class,"insert"] )->name("insert");
Route::get('blogs/delete/{id}', [AdminController::class, 'delete']);
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
Route::get('/change/{id}', [AdminController::class, 'change'])->name('change');