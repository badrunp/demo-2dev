<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create("feature_product", function (Blueprint $table) {
      $table->id();
      $table->boolean("is_checked")->default(false);
      $table->unsignedBiginteger("feature_id")->unsigned();
      $table->unsignedBiginteger("product_id")->unsigned();

      $table
        ->foreign("feature_id")
        ->references("id")
        ->on("features")
        ->onDelete("cascade");
      $table
        ->foreign("product_id")
        ->references("id")
        ->on("products")
        ->onDelete("cascade");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists("feature_product");
  }
};
