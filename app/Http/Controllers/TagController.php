<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;

class TagController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "tags" => Tag::select(["id", "name"])
        ->when($search, function (Builder $query, string $search) {
          $query->where("name", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];
    return view("tags.tag-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("tags.tag-create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      "name" => ["required", "string", "max:50", Rule::unique(Tag::class)],
      "desc" => ["nullable", "string", "min:3"],
    ]);

    Tag::create($data);

    return to_route("tags.index")->with("success", "Data berhasil ditambahkan");
  }

  /**
   * Display the specified resource.
   */
  public function show(Request $request, Tag $tag)
  {
    return view("tags.tag-detail", compact("tag"));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Tag $tag)
  {
    return view("tags.tag-edit", ["tag" => $tag]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Tag $tag)
  {
    $data = $request->validate([
      "name" => [
        "required",
        "string",
        "max:50",
        Rule::unique(Tag::class)->ignore($tag->id),
      ],
      "desc" => ["nullable", "string", "min:3"],
    ]);

    $tag->update($data);

    return to_route("tags.index")->with("success", "Data berhasil diedit");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Tag $tag)
  {
    $tag->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
