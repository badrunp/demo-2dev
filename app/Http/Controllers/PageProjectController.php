<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class PageProjectController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request)
  {
    $projects = Project::with(["type:id,name"])
      ->where("status", true)
            ->orderBy("created_at", "desc")
      ->get()
      ->groupBy("type.name");
    return view("proyek", compact("projects"));
  }
}
