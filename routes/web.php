<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonDatHangController;
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
Route::get("/tim-kiem", [PageController::class, "get_timkiem"])->name("timkiem");
Route::get("/dang-ky", [PageController::class, "get_DangKy"])->name("dangky");
Route::post("/dang-ky", [PageController::class, "post_DangKy"])->name("dangky");
Route::get("/dang-nhap", [PageController::class, "get_DangNhap"])->name("dangnhap");
Route::post("/dang-nhap", [PageController::class, "post_DangNhap"])->name("dangnhap");
Route::get('dang-xuat', [PageController::class, "get_DangXuat"])->name("dangxuat");

Route::group(["prefix" => "admin"], function () {
    Route::get("/index", [AdminController::class, "get_index"])->name("adminindex");
    Route::get("/them-loai-moi", [AdminController::class, "get_AddType"])->name("addtype");
    Route::post("/them-loai-moi", [AdminController::class, "post_AddType"])->name("addtype");
    Route::get("/capnhat-loai-sanpham/{id}", [AdminController::class, "get_EditType"])->name("edittype");
    Route::post("/capnhat-loai-sanpham/{id}", [AdminController::class, "post_EditType"])->name("edittype");
    Route::get("/xoa-loai-sanpham/{id}", [AdminController::class, "get_DeleteType"])->name("deletetype");

    Route::get("/billindex", [DonDatHangController::class, "get_index"])->name("billindex");
    Route::get("/chi-tiet-don-dat-hang/{id}", [DonDatHangController::class, "get_BillDetail"])->name("billdetail");
    Route::get("/xoa-don-hang/{id}", [DonDatHangController::class, "get_DeleteBill"])->name("deletebill");
    Route::get("/cap-nhat-don-hang/{id}", [DonDatHangController::class, "get_UpdateStatus"])->name("updatebill");
});
