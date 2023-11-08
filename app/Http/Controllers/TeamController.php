<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "teams" => Team::select(["id", "user_id", "status"])
        ->whereHas("user", function ($query) use ($search) {
          $query->where("name", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];

    return view("teams.team-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("teams.team-create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      "status" => ["nullable"],
      "user_id" => ["required", Rule::unique(Team::class)],
    ]);
    $data["status"] = $request->status ? $request->status : "noactive";
    Team::create($data);

    return to_route("teams.index")->with(
      "success",
      "Data berhasil ditambahkan"
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Team $team)
  {
    return view("teams.team-detail", compact("team"));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Team $team)
  {
    return view("teams.team-edit", compact("team"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Team $team)
  {
    $data = $request->validate([
      "status" => ["nullable"],
    ]);

    $team->update($data);

    return to_route("teams.index")->with("success", "Data berhasil diedit");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Team $team)
  {
    $team->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
