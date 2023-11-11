<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;

class ServiceController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "services" => Service::select(["id", "name", "desc", "photo"])
        ->when($search, function (Builder $query, string $search) {
          $query->where("name", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];
    return view("services.service-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("services.service-create");
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
        "max:50",
        Rule::unique(Service::class),
      ],
      "desc" => ["required", "string", "min:3"],
      "photo" => ["required", "image", "mimes:png,svg", "max:2048"],
    ]);

    $data["photo"] = $request->photo->store("images");

    Service::create($data);

    return to_route("services.index")->with(
      "success",
      "Data berhasil ditambahkan"
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Service $service)
  {
    return view("services.service-detail", ["service" => $service]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Service $service)
  {
    return view("services.service-edit", ["service" => $service]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Service $service)
  {
    $data = $request->validate([
      "name" => [
        "required",
        "string",
        "min:3",
        "max:50",
        Rule::unique(Service::class)->ignore($service->id),
      ],
      "desc" => ["required", "string", "min:3"],
      "photo" => ["nullable", "image", "mimes:png,svg", "max:2048"],
    ]);

    if ($request->hasFile("photo")) {
      if (Storage::exists($service->photo)) {
        Storage::delete($service->photo);
      }
      $data["photo"] = $request->photo->store("images");
    }

    $service->update($data);

    return to_route("services.index")->with("success", "Data berhasil diedit");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Service $service)
  {
    if (Storage::exists($service->photo)) {
      Storage::delete($service->photo);
    }

    $service->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
