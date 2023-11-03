<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('TagPost', function (Blueprint $table) {
            $table->id("IdTagPost")->autoIncrement();
            $table->bigInteger("IdTag");
            $table->bigInteger("IdPost");

            $table->foreign("IdTag")->references("IdTag")->on("Tag")->onUpdate("CASCADE");
            $table->foreign("IdPost")->references("IdPost")->on("Post")->onUpdate("CASCADE")->onDelete("CASCADE");

            $table->unique(["IdTag","IdPost"]);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TagPost');
    }
};
