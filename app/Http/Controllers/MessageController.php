<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "messages" => Message::select(["id", "name", "email", "messages"])
        ->when($search, function (Builder $query, string $search) {
          $query->where("name", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];
    return view("messages.message-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //  return view("messages.message-create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      "name" => ["required", "string", "min:3", "max:20"],
      "email" => ["required", "email", "string"],
      "messages" => ["required", "string", "min:3"],
    ]);

    Message::create($data);

    return to_route("kontak-kami")->with(
      "success",
      "Terimakasih pesan berhasil dikirim"
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Request $request, Message $message)
  {
    return view("messages.message-detail", compact("message"));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(message $message)
  {
    // return view("messages.message-edit", ["message" => $message]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, message $message)
  {
    // $data = $request->validate([
    //       "name" => ["required", "string", "min:3", "max:20"],
    //       "desc" => ["required", "string", "min:3"],
    //     ]);
    //
    //     $message->update($data);
    //
    //     return to_route("messages.index")->with("success", "Data berhasil diedit");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Message $message)
  {
    $message->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
