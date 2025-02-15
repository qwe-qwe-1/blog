<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use PackagesLaravel\Blog\Http\Controllers\PostController;
use PackagesLaravel\Blog\Http\Controllers\ReplyController;
use PackagesLaravel\Blog\Http\Controllers\TopicController;
use PackagesLaravel\Blog\Http\Controllers\TagController;

Route::group(['as' => 'blog.'], function (Router $router) {
    $router->apiResource('posts', PostController::class)->only(['index', 'show']);
    $router->apiResource('topics', TopicController::class)->only(['index', 'show']);
    $router->apiResource('tags', TagController::class)->only(['index', 'show']);
    $router->post('posts/{post}/reply', [ReplyController::class, 'reply'])->name('reply');
});