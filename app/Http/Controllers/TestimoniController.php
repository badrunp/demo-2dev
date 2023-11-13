<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class TestimoniController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "testimonis" => Testimoni::select(["id", "name", "pekerjaan", "alamat"])
        ->when($search, function (Builder $query, string $search) {
          $query->where("name", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];
    return view("testimonis.testimoni-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("testimonis.testimoni-create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      "name" => ["required", "string", "min:3", "max:100"],
      "message" => ["required", "string", "min:3"],
      "alamat" => ["nullable", "string", "min:3"],
      "pekerjaan" => ["nullable", "string", "min:3"],
      "photo" => ["nullable", "image", "mimes:png,jpg,jpeg", "max:2048"],
    ]);

    $data["photo"] = $request->photo ? $request->photo->store("images") : null;

    Testimoni::create($data);

    return to_route("testimonis.index")->with(
      "success",
      "Data berhasil ditambahkan"
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Testimoni $testimoni)
  {
    return view("testimonis.testimoni-detail", ["testimoni" => $testimoni]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Testimoni $testimoni)
  {
    return view("testimonis.testimoni-edit", ["testimoni" => $testimoni]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Testimoni $Testimoni)
  {
    $data = $request->validate([
      "name" => ["required", "string", "min:3", "max:20"],
      "message" => ["required", "string", "min:3"],
      "alamat" => ["nullable", "string", "min:3"],
      "pekerjaan" => ["nullable", "string", "min:3"],
      "photo" => ["nullable", "image", "mimes:png,jpg,jpeg", "max:2048"],
    ]);

    if ($request->hasFile("photo")) {
      if (Storage::exists($Testimoni->photo)) {
        Storage::delete($Testimoni->photo);
      }
      $data["photo"] = $request->photo->store("images");
    }

    $Testimoni->update($data);

    return to_route("testimonis.index")->with(
      "success",
      "Data berhasil diedit"
    );
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Testimoni $testimoni)
  {
    if ($testimoni->photo && Storage::exists($testimoni->photo)) {
      Storage::delete($testimoni->photo);
    }

    $testimoni->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
