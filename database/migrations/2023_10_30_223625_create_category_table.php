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
        Schema::create('Category', function (Blueprint $table) {
            $table->id('IdCategory')->autoIncrement();
            $table->string('NameCategory', 100);
            $table->string('slugCategory', 150);

            $table->unique('slugCategory');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Category');
    }
};
