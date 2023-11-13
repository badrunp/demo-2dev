<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Benefit;
use App\Models\Testimoni;
use App\Models\Team;
use App\Models\Faq;
use App\Models\Article;
use App\Models\Project;

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
        ->orderBy("price", "asc")
        ->get()
        ->groupBy("service.name"),
      "benefits" => Benefit::select(["title", "desc", "icon"])
        ->orderBy("id", "desc")
        ->limit(6)
        ->get(),
      "testimonis" => Testimoni::select([
        "name",
        "pekerjaan",
        "photo",
        "message",
      ])
        ->orderBy("id", "desc")
        ->limit(6)
        ->get(),
      "teams" => Team::with(
        "user:id,name,photo,jabatan,email,github_url,linkedin_url"
      )
        ->select("status", "user_id")
        ->where("status", "active")
        ->get(),
      "faqs" => Faq::select(["pertanyaan", "jawaban"])
        ->get(),
      "articles" => Article::where("status", true)
            ->orderBy("created_at", "desc")
        ->limit(6)
        ->get(),
      "projects" => Project::with(["type:id,name"])
            ->orderBy("created_at", "desc")
        ->where("status", true)
        ->limit(6)
        ->get()
        ->groupBy("type.name"),
    ];

    return view("home", $data);
  }
}
