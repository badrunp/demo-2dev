<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class TypeController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "types" => Type::select(["id", "name", "desc"])
        ->when($search, function (Builder $query, string $search) {
          $query->where("name", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];
    return view("types.type-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("types.type-create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      "name" => [
        "required",
        "string",
        "min:3",
        "max:20",
        Rule::unique(Type::class),
      ],
      "desc" => ["nullable", "string", "min:3"],
    ]);

    Type::create($data);

    return to_route("types.index")->with(
      "success",
      "Data berhasil ditambahkan"
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Request $request, Type $type)
  {
    return view("types.type-detail", compact("type"));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Type $type)
  {
    return view("types.type-edit", ["type" => $type]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Type $type)
  {
    $data = $request->validate([
      "name" => [
        "required",
        "string",
        "min:3",
        "max:20",
        Rule::unique(Type::class)->ignore($type->id),
      ],
      "desc" => ["nullable", "string", "min:3"],
    ]);

    $type->update($data);

    return to_route("types.index")->with("success", "Data berhasil diedit");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Type $type)
  {
    $type->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
