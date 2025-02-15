@extends('app')

@section('content')
<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <figure>
                <img class="rounded" src="{{ $post->image }}" alt="{{ $post->image_caption }}">
            </figure>

            <header class="mb-4 lg:mb-6 not-format">
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
            </header>

            {!! $post->content !!}

            <br />
            <span>{{ __('This page was last edited on: ') }} {{ now()->subMonth()->format(config('config.date-format')) }}</span>
        </article>
    </div>
</main>

<aside aria-label="{{ __('Related posts') }}" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
    <div class="px-4 mx-auto max-w-screen-xl">
        <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">{{ __('Related posts') }}</h2>
        <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($related as $post)
            <article class="max-w-xs">
                <a href="/{{ $post->slug }}">
                    <img src="{{ $post->image }}" class="mb-5 rounded" alt="{{ $post->image_caption }}">
                </a>
                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                    <a href="/{{ $post->slug }}">{{ $post->title }}</a>
                </h2>
                <p class="mb-4 text-gray-500 dark:text-gray-400">{{ substr(strip_tags($post->content), 0, 100) }}</p>
                <a href="/{{ $post->slug }}"
                    class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                    {{ __('Read more') }}
                </a>
            </article>
            @endforeach
        </div>
    </div>
</aside>
@endsection