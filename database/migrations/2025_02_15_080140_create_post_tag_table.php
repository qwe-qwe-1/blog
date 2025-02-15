<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection(config('config-packages-laravel-blog.db-connection'))->create('post_tag', function (Blueprint $table) {
            $table->uuid('tag_id')->index();
            $table->uuid('post_id')->index();
        });
    }

    public function down(): void
    {
        Schema::connection(config('config-packages-laravel-blog.db-connection'))->dropIfExists('post_tag');
    }
};