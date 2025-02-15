<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use PackagesLaravel\Blog\Models\Post;

interface PostRepositoryInterface
{
    public function paginate($perPage = null, $page = null): LengthAwarePaginator;
    public function all($columns = ['*']);
    public function hasMorePages(int $perPage, int $page);

    /**
     * @param string $slug
     * @return Post
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findBySlug(string $slug): Post;

    /**
     * @param Post $post
     * @param int $count
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRelated(Post $post, int $count): Collection;
}