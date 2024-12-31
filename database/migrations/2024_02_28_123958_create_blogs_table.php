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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->nullable();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->tinyText('description');
            $table->longText('content');
            $table->text('meta_keywords');
            $table->string('meta_image', 255);
            $table->tinyInteger('published')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->tinyInteger('allow_comments')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
