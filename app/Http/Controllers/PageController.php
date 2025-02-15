<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct(
        protected PostRepositoryInterface $postRepository
    ) {

    }

    public function posts($page = 1)
    {
        $paginator = $this->postRepository->paginate((int) config('config.perPage', 25), $page);

        return view('pages.index', [
            'paginator' => $paginator,
        ]);
    }

    public function post($slug)
    {
        $post = $this->postRepository->findBySlug($slug);

        return view('pages.post', [
            'post' => $post,
            'related' => $this->postRepository->getRelated($post, 4),
        ]);
    }

    public function grid()
    {
        return view('pages.grid', [
            'posts' => $this->postRepository->all([
                'slug',
                'image',
                'image_caption',
            ]),
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }
}
