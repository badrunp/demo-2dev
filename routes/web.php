<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PacketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageArticleController;
use App\Http\Controllers\PageProjectController;

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

Route::get("/", HomeController::class)->name("home");

Route::get("/proyek", PageProjectController::class)->name("proyek");

Route::get("/harga", PriceController::class)->name("harga");

Route::get("/artikel", PageArticleController::class)->name("artikel");

Route::get("/tentang-kami", AboutController::class)->name("tentang-kami");

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

Route::get("proyek/{project:slug}", [ProjectController::class, "show"])->name(
  "projects.show"
);
Route::get("artikel/{article:slug}", [ArticleController::class, "show"])->name(
  "articles.show"
);

Route::middleware("auth")->group(function () {
  Route::resource("users", UserController::class);
  Route::resource("products", ProductController::class);
  Route::resource("services", ServiceController::class);
  Route::resource("packets", PacketController::class);
  Route::resource("testimonis", TestimoniController::class);
  Route::resource("features", FeatureController::class);
  Route::resource("faqs", FaqController::class);
  Route::resource("benefits", BenefitController::class);
  Route::resource("teams", TeamController::class);
  Route::resource("projects", ProjectController::class)->except(["show"]);
  Route::resource("types", TypeController::class);
  Route::resource("tools", ToolController::class);
  Route::resource("categories", CategoryController::class);
  Route::resource("messages", MessageController::class)->only([
    "index",
    "show",
    "create",
    "destroy",
    "store",
  ]);
  Route::resource("tags", TagController::class);
  Route::resource("articles", ArticleController::class)->except(["show"]);

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
