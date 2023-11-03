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
        Schema::create('Post', function (Blueprint $table) {
            $table->id("IdPost")->autoIncrement();
            $table->bigInteger ('IdCategory');
            $table->bigInteger ('IdUser');
            $table->string('Title', 150);
            $table->text('Body');
            $table->string('SlugPost', 250);
            $table->timestamp('CreatedAt')->useCurrent();
            $table->timestamp('UpdatedAt')->useCurrent();


            $table->foreign('IdCategory')
            ->references('IdCategory')
            ->on('Category')
            ->onUpdate("CASCADE");
            
            $table->foreign('IdUser')
            ->references('IdUser')
            ->on('User')
            ->onDelete("CASCADE")->onUpdate("CASCADE");

            $table->unique('SlugPost');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Post');
    }
};
