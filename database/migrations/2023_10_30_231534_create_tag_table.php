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
        Schema::create('Tag', function (Blueprint $table) {
            $table->id('IdTag')->autoIncrement();
            $table->string('NameTag', 30);
            $table->string('SlugTag', 50);

            $table->unique('SlugTag');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Tag');
    }
};
