<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class BenefitController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "benefits" => Benefit::select(["id", "title", "icon"])
        ->when($search, function (Builder $query, string $search) {
          $query->where("title", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];
    return view("benefits.benefit-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("benefits.benefit-create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      "title" => ["required", "string", "min:3", "max:50"],
      "desc" => ["required", "string", "min:3"],
      "icon" => ["required", "string", "min:3"],
    ]);

    Benefit::create($data);

    return to_route("benefits.index")->with(
      "success",
      "Data berhasil ditambahkan"
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Request $request, Benefit $benefit)
  {
    return view("benefits.benefit-detail", compact("benefit"));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Benefit $benefit)
  {
    return view("benefits.benefit-edit", ["benefit" => $benefit]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Benefit $benefit)
  {
    $data = $request->validate([
      "title" => ["required", "string", "min:3", "max:50"],
      "desc" => ["required", "string", "min:3"],
      "icon" => ["required", "string", "min:3"],
    ]);

    $benefit->update($data);

    return to_route("benefits.index")->with("success", "Data berhasil diedit");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Benefit $benefit)
  {
    $benefit->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
