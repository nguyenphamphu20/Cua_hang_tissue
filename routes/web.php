<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/index", [PageController::class, "getIndex"])->name("index");
Route::get("/loai-san-pham/{id}", [PageController::class, "getLoaisanpham"])->name("loaisanpham");
Route::get("/chi-tiet-san-pham/{id}", [PageController::class, "getChitietsanpham"])->name("chitietsanpham");
Route::get("/lien-he", [PageController::class, "getLienhe"])->name("lienhe");
Route::get("/gioi-thieu", [PageController::class, "getGioithieu"])->name("gioithieu");
Route::get("/them-vao-gio-hang/{id}", [PageController::class, "get_ThemGioHang"])->name("themgiohang");
Route::get("/xoa-gio-hang/{id}", [PageController::class, "get_XoaGioHang"])->name("xoagiohang");
Route::get("/dat-hang", [PageController::class, "get_DatHang"])->name("dathang");
Route::post("/dat-hang", [PageController::class, "post_DatHang"])->name("dathang");
