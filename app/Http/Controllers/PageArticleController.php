<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PageArticleController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request)
  {
    $articles = Article::where("status", true)
      ->orderBy("created_at", "desc")
      ->get();
    return view("artikel", compact("articles"));
  }
}
