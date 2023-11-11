<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;

class ArticleController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->query("search");
    $data = [
      "articles" => Article::select([
        "id",
        "title",
        "user_id",
        "category_id",
        "status",
        "slug",
      ])
        ->when($search, function (Builder $query, string $search) {
          $query->where("title", "like", "%" . $search . "%");
        })
        ->paginate(10),
    ];

    return view("articles.article-index", $data);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categories = Category::select("id", "name")->get();
    $tags = Tag::select("id", "name")->get();
    return view("articles.article-create", compact(["categories", "tags"]));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      "title" => [
        "required",
        "string",
        "min:3",
        "max:100",
        Rule::unique(Article::class),
      ],
      "category_id" => ["required"],
      "thumbnail" => ["required", "image", "mimes:png,jpg,jpeg"],
      "summary" => ["required", "min:8"],
      "status" => ["nullable"],
      "content" => ["required", "string", "min:3"],
    ]);

    $data["thumbnail"] = $request->thumbnail->store("images");
    $data["status"] = $request->status == "true";
    $data["user_id"] = $request->user()->id;
    $data["slug"] = Str::slug($request->title);

    $article = Article::create($data);

    if ($request->tags_id) {
      $article->tags()->sync($request->tags_id);
    }

    return to_route("articles.index")->with(
      "success",
      "Data berhasil ditambahkan"
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Request $request, Article $article)
  {
    $articles = Article::whereNot("id", $article->id)
      ->orderBy("created_at", "desc")
      ->limit(6)
      ->get();
    return view("articles.article-detail", compact("article", "articles"));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Article $article)
  {
    $categories = Category::select("id", "name")->get();
    $tags = Tag::select("id", "name")->get();

    return view(
      "articles.article-edit",
      compact(["categories", "tags", "article"])
    );
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, article $article)
  {
    $data = $request->validate([
      "title" => [
        "required",
        "string",
        "min:3",
        "max:100",
        Rule::unique(Article::class)->ignore($article->id),
      ],
      "category_id" => ["required"],
      "thumbnail" => ["nullable", "image", "mimes:png,jpg,jpeg"],
      "summary" => ["required", "min:8"],
      "status" => ["nullable"],
      "content" => ["required", "string", "min:3"],
    ]);

    if ($request->hasFile("thumbnail")) {
      if (Storage::exists($article->thumbnail)) {
        Storage::delete($article->thumbnail);
      }
      $data["thumbnail"] = $request->thumbnail->store("images");
    }
    $data["status"] = $request->status == "true";
    $data["slug"] = Str::slug($request->title);

    $article->update($data);

    if ($request->tags_id) {
      $article->tags()->sync($request->tags_id);
    }

    return to_route("articles.index")->with("success", "Data berhasil diubah");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Article $article)
  {
    if ($article->thumbnail && Storage::exists($article->thumbnail)) {
      Storage::delete($article->thumbnail);
    }

    $article->delete();
    return redirect()
      ->back()
      ->with("success", "Data berhasil dihapus");
  }
}
