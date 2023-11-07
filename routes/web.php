<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PacketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () {
  return view("home");
})->name("home");

Route::get("/proyek", function () {
  return view("proyek");
})->name("proyek");

Route::get("/harga", function () {
  return view("harga");
})->name("harga");

Route::get("/artikel", function () {
  return view("artikel");
})->name("artikel");

Route::get("/tentang-kami", function () {
  return view("tentang-kami");
})->name("tentang-kami");

Route::get("/kontak-kami", function () {
  return view("kontak-kami");
})->name("kontak-kami");

Route::get("/kebijakan-privasi", function () {
  return view("kebijakan-privasi");
})->name("kebijakan-privasi");

Route::get("/penggunaan-cookies", function () {
  return view("penggunaan-cookies");
})->name("penggunaan-cookies");

Route::get("/dashboard", DashboardController::class)
  ->middleware(["auth", "verified"])
  ->name("dashboard");

Route::middleware("auth")->group(function () {
  Route::resource("users", UserController::class);
  Route::resource("products", ProductController::class);
  Route::resource("services", ServiceController::class);
  Route::resource("packets", PacketController::class);
  
  Route::resource("features", FeatureController::class);

  Route::get("/profile", [ProfileController::class, "edit"])->name(
    "profile.edit"
  );
  Route::patch("/profile", [ProfileController::class, "update"])->name(
    "profile.update"
  );
  Route::delete("/profile", [ProfileController::class, "destroy"])->name(
    "profile.destroy"
  );
});

require __DIR__ . "/auth.php";
