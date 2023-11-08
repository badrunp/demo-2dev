<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
     $data = [
      "teams" => Team::with(
        "user:id,name,photo,jabatan,email,github_url,linkedin_url"
      )
        ->select("status", "user_id")
        ->where("status", "active")
        ->get()
      ];
        return view("tentang-kami", $data);
    }
}
