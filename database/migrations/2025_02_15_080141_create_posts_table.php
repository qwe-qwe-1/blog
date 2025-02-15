<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection(config('config-packages-laravel-blog.db-connection'))->create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->index();
            $table->uuid('topic_id')->index();
            $table->string('slug')->index();
            $table->string('title');
            $table->string('summary')->nullable();
            $table->longText('content');
            $table->string('image')->nullable();
            $table->string('image_caption')->nullable();
            $table->datetime('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection(config('config-packages-laravel-blog.db-connection'))->dropIfExists('posts');
    }
};