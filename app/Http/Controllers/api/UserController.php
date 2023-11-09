<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function findAllAdmin()
  {
    $user = User::select("id", "name as text")->get();

    return response()->json($user);
  }

  public function findById($id)
  {
    $user = User::find($id);
    return response()->json($user);
  }
}
