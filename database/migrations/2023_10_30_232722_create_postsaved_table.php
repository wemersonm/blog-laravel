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
        Schema::create('PostSaved', function (Blueprint $table) {
            $table->id("IdPostSaved")->autoIncrement();
            $table->foreignId("IdPost")->constrained('Post', "IdPost")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("IdUser")->constrained('User', "IdUser");
            $table->timestamp("CreatedAt")->useCurrent();
            $table->timestamp("UpdatedAt")->useCurrent();

            $table->unique(["IdPost", "IdUser"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PostSaved');
    }
};
