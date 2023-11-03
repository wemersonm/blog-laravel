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
        Schema::create('PostComment', function (Blueprint $table) {
            $table->id("IdPostComment")->autoIncrement();
            $table->bigInteger("IdPost");
            $table->bigInteger("IdUser");
            $table->text("Content");
            $table->timestamp("CreatedAt")->useCurrent();
            $table->timestamp("UpdatedAt")->useCurrent();

            $table->foreign("IdPost")->references("IdPost")->on("Post")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->foreign("IdUser")->references("IdUser")->on("User")->onUpdate("NO ACTION")->onDelete("NO ACTION");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PostComment');
    }
};
