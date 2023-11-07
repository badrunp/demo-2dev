<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
     public function findAll()
  {
    $data = Feature::select(["id", "name as text"])->get();
    return response()->json($data);
  }
}
