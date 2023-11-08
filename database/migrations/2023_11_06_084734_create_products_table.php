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
    Schema::create("products", function (Blueprint $table) {
      $table->id();
      $table
        ->enum("status", ["published", "unpublished"])
        ->default("unpublished");
      $table
        ->integer("discount")
        ->nullable()
        ->default(0);
      $table->string("banner")->nullable();
      $table->integer("price");

      $table->unsignedBiginteger("packet_id")->unsigned();
      $table->unsignedBiginteger("service_id")->unsigned();

      $table
        ->foreign("packet_id")
        ->references("id")
        ->on("packets")
        ->onDelete("cascade");
      $table
        ->foreign("service_id")
        ->references("id")
        ->on("services")
        ->onDelete("cascade");

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists("products");
  }
};
