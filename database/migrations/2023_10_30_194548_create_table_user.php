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
        Schema::create('User', function (Blueprint $table) {
            $table->id('IdUser')->autoIncrement();
            $table->string('Username', 30);
            $table->string('UserFullname', 120);
            $table->string('UserBio', 300)->default('');
            $table->string('Email', 120);
            $table->string('Password', 255);
            $table->string('UserImage', 255);
            $table->boolean('Active')->default(1);
            $table->timestamp('CreatedAt')->useCurrent();
            $table->timestamp('UpdatedAt')->useCurrent();
   
            // $table->primary('IdUser')

            $table->unique('Email');
            $table->unique('Username');


            $table->index('Email');
            $table->index('Username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('User');
    }
};
