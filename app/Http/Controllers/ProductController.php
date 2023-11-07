<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Models\Packet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = [
      "products" => Product::with(["service:id,name", "packet:id,name"])
        ->select("id", "status", "packet_id", "service_id")
        ->paginate(10),
    ];

    return view("products.product-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $data = [
      "services" => Service::select(["id", "name"])
        ->orderBy("id", "desc")
        ->get(),
    ];
    return view("products.product-create", $data);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // dd($request->all());
    $validator = Validator::make($request->all(), [
      "service_id" => "required",
      "packet_id" => "required",
      "discount" => "nullable",
      "status" => "required",
      "banner" => "nullable",
    ]);

    $validator->after(function ($validator) use ($request) {
      if (!$request->features) {
        $validator
          ->errors()
          ->add("features", "Minimal ada 1 fitur yang di tambahkan!");
      }
    });

    $features = [];
    $no_features = null;
    $features_check = $request->features_check ? $request->features_check : [];
    if ($request->features) {
      $input_features = $request->features;
      foreach ($input_features as $value) {
        $arr = explode("_", $value);
        $id = $arr[0];
        $no = $arr[1];
        $text = $arr[2];

        array_push($features, [
          "id" => $id,
          "text" => $text,
          "checked" => in_array($no, $features_check),
          "no_feature" => $no,
          "value" => $value,
        ]);

        $no_features = $no + 1;
      }
    }

    if ($validator->fails()) {
      $packet = null;
      if ($request->packet_id) {
        $packet = Packet::select(["id", "name"])->find($request->packet_id);
      }

      return to_route("products.create")
        ->withErrors($validator)
        ->withInput()
        ->with("packet", $packet)
        ->with("no_features", $no_features)
        ->with("features", $features);
    }

    $features_data = [];
    foreach ($features as $value) {
      $features_data[$value["id"]] = ["is_checked" => $value["checked"]];
    }

    $product = Product::create($validator->validated());
    $product->features()->sync($features_data);

    return to_route("products.index")->with(
      "success",
      "Data berhasil ditambahkan"
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Product $product)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Product $product)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product)
  {
    $product->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
