<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection(config('config-packages-laravel-blog.db-connection'))->create('images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('post_id')->index();
            $table->string('name');
            $table->string('path');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection(config('config-packages-laravel-blog.db-connection'))->dropIfExists('images');
    }
};