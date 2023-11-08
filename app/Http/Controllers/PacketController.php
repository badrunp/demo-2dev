<?php

namespace App\Http\Controllers;

use App\Models\Packet;
use Illuminate\Http\Request;

class PacketController extends Controller /**
   * Display a listing of the resource.
   */
{
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "packets" => Packet::select(["id", "name", "desc"])
        ->when($search, function (Builder $query, string $search) {
          $query->where("name", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];
    return view("packets.packet-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("packets.packet-create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      "name" => ["required", "string", "min:3", "max:20"],
      "desc" => ["required", "string", "min:3"],
    ]);

    Packet::create($data);

    return to_route("packets.index")->with(
      "success",
      "Data berhasil ditambahkan"
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Request $request, Packet $packet)
  {
    

    return view("packets.packet-detail", compact("packet"));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Packet $packet)
  {
    return view("packets.packet-edit", ["packet" => $packet]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Packet $packet)
  {
    $data = $request->validate([
      "name" => ["required", "string", "min:3", "max:20"],
      "desc" => ["required", "string", "min:3"],
    ]);

    $packet->update($data);

    return to_route("packets.index")->with("success", "Data berhasil diedit");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Packet $packet)
  {
    $packet->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
