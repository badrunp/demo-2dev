<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "faqs" => Faq::select(["id", "pertanyaan"])
        ->when($search, function (Builder $query, string $search) {
          $query->where("pertanyaan", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];
    return view("faqs.faq-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("faqs.faq-create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      "pertanyaan" => ["required", "string", "min:3"],
      "jawaban" => ["required", "string", "min:3"],
    ]);

    Faq::create($data);

    return to_route("faqs.index")->with("success", "Data berhasil ditambahkan");
  }

  /**
   * Display the specified resource.
   */
  public function show(Faq $faq)
  {
    return view("faqs.faq-detail", ["faq" => $faq]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Faq $faq)
  {
    return view("faqs.faq-edit", ["faq" => $faq]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Faq $faq)
  {
    $data = $request->validate([
      "pertanyaan" => ["required", "string", "min:3"],
      "jawaban" => ["required", "string", "min:3"],
    ]);

    $faq->update($data);

    return to_route("faqs.index")->with("success", "Data berhasil diedit");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Faq $faq)
  {
    $faq->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
