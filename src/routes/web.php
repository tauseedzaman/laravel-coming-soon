<?php

use tauseedzaman\ComingSoon\Http\Controllers\Admin\ComingSoonController;

Route::get("/admin/coming-soon", [ComingSoonController::class, "index"])->name("coming_soon.index");
Route::get("/admin/coming-soon/create", [ComingSoonController::class, "create"])->name("coming_soon.create");
Route::post("/admin/coming-soon/store", [ComingSoonController::class, "store"])->name("coming_soon.store");
Route::get("/admin/coming-soon/edit/{id}", [ComingSoonController::class, "edit"])->name("coming_soon.edit");
Route::post("/admin/coming-soon/edit/{id}", [ComingSoonController::class, "update"])->name("coming_soon.update");
Route::get("/admin/coming-soon/delete/{id}", [ComingSoonController::class, "destroy"])->name("coming_soon.delete");
