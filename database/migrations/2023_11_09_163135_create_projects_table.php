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
    Schema::create("projects", function (Blueprint $table) {
      $table->id();
      $table->string("name");
      $table->string("slug");
      $table->string("thumbnail");
      $table->string("demo_url")->nullable();
      $table->text("summary");
      $table->text("desc");
      $table->boolean("status")->default(false);

      $table->unsignedBiginteger("type_id")->unsigned();
      $table
        ->foreign("type_id")
        ->references("id")
        ->on("types")
        ->onDelete("cascade");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists("projects");
  }
};
