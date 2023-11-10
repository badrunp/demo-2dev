<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "categories" => Category::select(["id", "name", "desc"])
        ->when($search, function (Builder $query, string $search) {
          $query->where("name", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];
    return view("category.category-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("category.category-create");
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
        Rule::unique(Category::class),
      ],
      "desc" => ["nullable", "string", "min:3"],
    ]);

    Category::create($data);

    return to_route("categories.index")->with(
      "success",
      "Data berhasil ditambahkan"
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Request $request, Category $category)
  {
    return view("category.category-detail", compact("category"));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Category $category)
  {
    return view("category.category-edit", ["category" => $category]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Category $category)
  {
    $data = $request->validate([
      "name" => [
        "required",
        "string",
        "min:3",
        "max:20",
        Rule::unique(Category::class)->ignore($category->id),
      ],
      "desc" => ["nullable", "string", "min:3"],
    ]);

    $category->update($data);

    return to_route("categories.index")->with(
      "success",
      "Data berhasil diedit"
    );
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Category $category)
  {
    $category->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
