<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use PackagesLaravel\Blog\Models\Post;

class PostRepository extends AbstractRepository implements PostRepositoryInterface
{
    protected $model = Post::class;

    /**
     * @param int|null|\Closure $perPage
     * @param array|string $columns
     * @param string $pageName
     * @param int|null $page
     * @param \Closure|int|null $total
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function paginate($perPage = null, $page = null): LengthAwarePaginator
    {
        return $this->query()->paginate($perPage, ['*'], 'page', $page);
    }

    /**
     * @param array|string $columns
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']): Collection
    {
        return $this->query()->get($columns);
    }

    /**
     * @param int $perPage
     * @param int $page
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function hasMorePages(int $perPage, int $page): bool
    {
        return $this->query()->count() > $perPage * $page;
    }

    /**
     * @param string $slug
     *
     * @return Post
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findBySlug(string $slug): Post
    {
        return $this->query()->where('slug', $slug)->firstOrFail();
    }

    /**
     * @param Post $post
     * @param int $count
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRelated(Post $post, int $count): Collection
    {
        return $post->topic->posts()
            ->where('id', '!=', $post->id)
            ->inRandomOrder()
            ->take($count)
            ->get();
    }
}