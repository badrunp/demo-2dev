<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Tool;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;

class ProjectController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "projects" => project::select([
        "id",
        "name",
        "type_id",
        "status",
        "slug",
      ])
        ->when($search, function (Builder $query, string $search) {
          $query->where("name", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];

    return view("projects.project-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $types = Type::select("id", "name")->get();
    $tools = Tool::select("id", "name")->get();
    return view("projects.project-create", compact(["types", "tools"]));
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
        "max:100",
        Rule::unique(Project::class),
      ],
      "type_id" => ["required"],
      "thumbnail" => ["required", "image", "mimes:png,jpg,jpeg"],
      "demo_url" => ["nullable", "string", "url:http,https", "max:255"],
      "summary" => ["required", "min:8"],
      "status" => ["nullable"],
      "desc" => ["required", "string", "min:3"],
    ]);

    $data["thumbnail"] = $request->thumbnail->store("images");
    $data["status"] = $request->status == "true";
    $data["slug"] = Str::slug($request->name);

    $project = Project::create($data);

    if ($request->tools_id) {
      $project->tools()->sync($request->tools_id);
    }

    return to_route("projects.index")->with(
      "success",
      "Data berhasil ditambahkan"
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Request $request, Project $project)
  {
    return view("projects.project-detail", compact("project"));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(project $project)
  {
    $types = Type::select("id", "name")->get();
    $tools = Tool::select("id", "name")->get();
    return view(
      "projects.project-edit",
      compact(["types", "tools", "project"])
    );
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Project $project)
  {
    $data = $request->validate([
      "name" => [
        "required",
        "string",
        "min:3",
        "max:100",
        Rule::unique(Project::class)->ignore($project->id),
      ],
      "type_id" => ["required"],
      "thumbnail" => ["nullable", "image", "mimes:png,jpg,jpeg", "max:2048"],
      "demo_url" => ["nullable", "string", "url:http,https", "max:255"],
      "summary" => ["required", "min:8"],
      "status" => ["nullable"],
      "desc" => ["required", "string", "min:3"],
    ]);

    if ($request->hasFile("thumbnail")) {
      if (Storage::exists($project->thumbnail)) {
        Storage::delete($project->thumbnail);
      }
      $data["thumbnail"] = $request->thumbnail->store("images");
    }
    $data["status"] = $request->status == "true";
    $data["slug"] = Str::slug($request->name);

    $project->update($data);

    if ($request->tools_id) {
      $project->tools()->sync($request->tools_id);
    }

    return to_route("projects.index")->with("success", "Data berhasil diubah");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Project $project)
  {
    if ($project->thumbnail && Storage::exists($project->thumbnail)) {
      Storage::delete($project->thumbnail);
    }

    $project->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
