<?php

use tauseedzaman\ComingSoon\Http\Controllers\Admin\ComingSoonController;
use Illuminate\Routing\Route;

Route::prefix("/admin")->name("coming_soon.")->group(function () {
    Route::get("/coming-soon", [ComingSoonController::class, "index"])->name("index");
    Route::get("/coming-soon/create", [ComingSoonController::class, "create"])->name("create");
    Route::post("/coming-soon/store", [ComingSoonController::class, "store"])->name("store");
    Route::get("/coming-soon/edit/{id}", [ComingSoonController::class, "edit"])->name("edit");
    Route::post("/coming-soon/edit/{id}", [ComingSoonController::class, "update"])->name("update");
    Route::get("/coming-soon/delete/{id}", [ComingSoonController::class, "destroy"])->name("delete");
});
