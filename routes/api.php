<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PacketController;
use App\Http\Controllers\api\FeatureController;
use App\Http\Controllers\api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
  return $request->user();
});

Route::prefix("packets")->group(function () {
  Route::get("/", [PacketController::class, "findAll"])->name(
    "api.packets.findAll"
  );
  Route::get("/{id}", [PacketController::class, "findById"])->name(
    "api.packets.findById"
  );
});

Route::prefix("features")->group(function () {
  Route::get("/", [FeatureController::class, "findAll"])->name(
    "api.features.findAll"
  );
});

Route::prefix("users")->group(function () {
  Route::get("/admin", [UserController::class, "findAllAdmin"])->name(
    "api.users.findAllAdmin"
  );
  Route::get("/{id}", [UserController::class, "findById"])->name(
    "api.users.findById"
  );
});
