<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request)
  {
    $data = [
      "products" => Product::with([
        "service:id,name,desc,photo",
        "packet:id,name,desc",
        "features",
      ])
        ->where("status", "published")
        ->get()
        ->groupBy("service.name"),
    ];
    return view("home", $data);
  }
}
