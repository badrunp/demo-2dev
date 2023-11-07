<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "users" => User::select([
        "id",
        "name",
        "email",
        "role",
        "phone",
        "jabatan",
      ])
        ->when($search, function (Builder $query, string $search) {
          $query->where("name", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];
    return view("users", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("users.users-create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      "name" => ["required", "string", "min:3", "max:20"],
      "role" => ["required", "string"],
      "jabatan" => ["nullable", "string", "min:3", "max:20"],
      "email" => ["required", "string", "email", Rule::unique(User::class)],
      "password" => ["required", "string", "min:8"],
    ]);

    $data["password"] = bcrypt($data["password"]);
    User::create($data);

    return to_route("users.index")->with(
      "success",
      "Data berhasil ditambahkan"
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    return view("users.users-detail", ["user" => $user]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
      if (!Gate::allows("super-admin")) {
      return to_route("users.index")
        ->with(
          "error",
          "Maaf anda tidak mempunyai wewenang untuk mengedit akun ini."
        );
    }
    return view("users.users-edit", ["user" => $user]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $user)
  {
      if (!Gate::allows("super-admin")) {
      return to_route("users.index")
        ->with(
          "error",
          "Maaf anda tidak mempunyai wewenang untuk mengupdate akun ini."
        );
    }
  
    $data = $request->validate([
      "name" => ["required", "string", "max:20"],
      "phone" => [
        "nullable",
        "string",
        "min:12",
        "max:13",
        Rule::unique(User::class)->ignore($user->id),
      ],
      "github_url" => ["nullable", "string", "url:http,https", "max:255"],
      "linkedin_url" => ["nullable", "string", "url:http,https", "max:255"],
      "jabatan" => ["nullable", "min:3", "max:20"],
      "role" => ["required"],
    ]);

    $user->update($data);
    return to_route("users.index")->with("success", "Data berhasil diedit");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $request, User $user)
  {
    if ($request->user()->id == $user->id) {
      return to_route("users.index")->with(
        "error",
        "Anda tidak dapat menghapus akun diri sendiri."
      );
    }

    if (!Gate::allows("super-admin")) {
      return to_route("users.index")->with(
        "error",
        "Maaf anda tidak mempunyai wewenang untuk menghapus akun ini."
      );
    }

    $user->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
