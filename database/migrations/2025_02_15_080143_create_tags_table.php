<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection(config('config-packages-laravel-blog.db-connection'))->create('tags', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->index();
            $table->string('slug')->index();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection(config('config-packages-laravel-blog.db-connection'))->dropIfExists('tags');
    }
};