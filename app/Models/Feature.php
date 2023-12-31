<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feature extends Model
{
  use HasFactory;

  protected $with = [];

  protected $fillable = ["name", "desc"];

  public function products(): BelongsToMany
  {
    return $this->belongsToMany(Product::class);
  }
}
