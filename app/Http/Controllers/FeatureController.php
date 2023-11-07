<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "features" => Feature::select(["id", "name", "desc"])
        ->when($search, function (Builder $query, string $search) {
          $query->where("name", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];
    return view("features.feature-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("features.feature-create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      "name" => ["required", "string", "min:3", "max:20"],
      "desc" => ["nullable", "string", "min:3"],
    ]);

    Feature::create($data);

    return to_route("features.index")->with(
      "success",
      "Data berhasil ditambahkan"
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Feature $feature)
  {
    return view("features.feature-detail", ["feature" => $feature]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Feature $feature)
  {
    return view("features.feature-edit", ["feature" => $feature]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Feature $feature)
  {
    $data = $request->validate([
      "name" => ["required", "string", "min:3", "max:20"],
      "desc" => ["nullable", "string", "min:3"],
    ]);

    $feature->update($data);

    return to_route("features.index")->with("success", "Data berhasil diedit");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Feature $feature)
  {
    $feature->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
