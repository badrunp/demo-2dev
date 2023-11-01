<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request)
  {
    $data = [
      "isComplate" => $this->isComplate($request->user()),
    ];

    return view("dashboard", $data);
  }

  public function isComplate($user)
  {
    return $user->phone && $user->github_url && $user->linkedin_url;
  }
}
