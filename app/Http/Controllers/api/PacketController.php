<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packet;

class PacketController extends Controller
{
  public function findAll()
  {
    $data = Packet::select(["id", "name as text"])->get();
    return response()->json($data);
  }

  public function findById($id)
  {
    $data = Packet::find($id);
    return response()->json($data);
  }
}
