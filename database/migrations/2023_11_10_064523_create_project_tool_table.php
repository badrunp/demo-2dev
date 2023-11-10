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
    Schema::create("project_tool", function (Blueprint $table) {
      $table->id();
      $table->unsignedBiginteger("project_id")->unsigned();
      $table->unsignedBiginteger("tool_id")->unsigned();

      $table
        ->foreign("project_id")
        ->references("id")
        ->on("projects")
        ->onDelete("cascade");
      $table
        ->foreign("tool_id")
        ->references("id")
        ->on("tools")
        ->onDelete("cascade");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists("project_tool");
  }
};
