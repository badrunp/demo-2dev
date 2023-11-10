<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  use HasFactory;
  
  protected $with =["type"];

  protected $fillable = [
    "name",
    "slug",
    "thumbnail",
    "summary",
    "desc",
    "demo_url",
    "type_id",
    "status",
  ];

  public function type(): BelongsTo
  {
    return $this->belongsTo(Type::class);
  }
  
  public function tools(): BelongsToMany
  {
    return $this->belongsToMany(Tool::class);
  }
}
