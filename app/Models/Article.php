<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
  use HasFactory;

  protected $with = ["user", "category"];

  protected $fillable = [
    "title",
    "slug",
    "thumbnail",
    "summary",
    "category_id",
    "user_id",
    "content",
    "status",
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class);
  }
  public function tags(): BelongsToMany
  {
    return $this->belongsToMany(Tag::class);
  }
}
