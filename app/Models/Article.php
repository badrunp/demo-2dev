<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

  private function getEstimateReadingTime($content, $wpm = 200)
  {
    $wordCount = str_word_count(strip_tags($content));

    $minutes = (int) floor($wordCount / $wpm);
    $seconds = (int) floor(($wordCount % $wpm) / ($wpm / 60));

    if ($minutes === 0) {
      return "{$seconds} sec read";
    } else {
      return "{$minutes} min read";
    }
  }

  protected function timeToRead(): Attribute
  {
    return Attribute::make(
      get: function ($value, $attributes) {
        $value = $this->getEstimateReadingTime($attributes["content"]);

        return $value;
      }
    );
  }
}
