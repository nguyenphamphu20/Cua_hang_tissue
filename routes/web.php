<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/index", [PageController::class, "getIndex"]);
Route::get("/loai-san-pham/{type}", [PageController::class, "getLoaisanpham"]);
Route::get("/chi-tiet-san-pham", [PageController::class, "getChitietsanpham"]);
Route::get("/lien-he", [PageController::class, "getLienhe"]);
Route::get("/gioi-thieu", [PageController::class, "getGioithieu"]);