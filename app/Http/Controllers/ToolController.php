<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ToolController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "tools" => Tool::select(["id", "name", "desc"])
        ->when($search, function (Builder $query, string $search) {
          $query->where("name", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];
    return view("tools.tool-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("tools.tool-create");
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
        Rule::unique(Tool::class),
      ],
      "desc" => ["nullable", "string", "min:3"],
    ]);

    Tool::create($data);

    return to_route("tools.index")->with(
      "success",
      "Data berhasil ditambahkan"
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Request $request, Tool $tool)
  {
    return view("tools.tool-detail", compact("tool"));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Tool $tool)
  {
    return view("tools.tool-edit", ["tool" => $tool]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Tool $tool)
  {
    $data = $request->validate([
      "name" => ["required", "string", "min:3", "max:20", Rule::unique(Tool::class)->ignore($tool->id)],
      "desc" => ["nullable", "string", "min:3"],
    ]);

    $tool->update($data);

    return to_route("tools.index")->with("success", "Data berhasil diedit");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Tool $tool)
  {
    $tool->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
