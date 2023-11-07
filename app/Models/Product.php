<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
  use HasFactory;

  protected $with = ["features", "packet", "service"];

  protected $fillable = [
    "status",
    "discount",
    "banner",
    "packet_id",
    "service_id",
  ];

  public function packet(): BelongsTo
  {
    return $this->belongsTo(Packet::class);
  }

  public function service(): BelongsTo
  {
    return $this->belongsTo(Service::class);
  }

  public function features(): BelongsToMany
  {
    return $this->belongsToMany(Feature::class);
  }
}
