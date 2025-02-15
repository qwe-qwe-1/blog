@extends('app')

@section('content')
<main class="mx-7 lg:mx-6 mt-32 flex-grow">
  <div class="max-w-5xl mx-auto">
    <div class="flex flex-wrap -mx-2">
      @foreach($paginator as $post)
      <div class="w-full sm:w-1/2 md:w-1/3 self-stretch p-2 mb-2">
        <a href="/{{ $post->slug }}">
          <img class="rounded" src="{{ $post->image }}" alt="{{ $post->image_caption }}" />
        </a>
        <div class="p-5">
          <a href="/{{ $post->slug }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
          </a>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ substr(strip_tags($post->content), 0, 100) }}
          </p>
          <a href="/{{ $post->slug }}"
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ __('Read more') }}
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
          </a>
        </div>
      </div>
      @endforeach

      @if($paginator->lastPage() > 1)
      <nav style="margin: 50px auto">
        <ul class="inline-flex -space-x-px text-base h-10">
          <li>
            <a href="/page/1"
              class="{{ ($paginator->currentPage() == 1) ? '' : 'hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-white' }} flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">{{ __('Previous') }}</a>
          </li>
          @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
              <a href="/page/{{ $i }}" {{ ($paginator->currentPage() == $i) ? 'aria-current="page"' : '' }}
                class="{{ ($paginator->currentPage() == $i) ? 'text-blue-600 hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-white' : 'hover:bg-blue-100 hover:text-blue-700 hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-white' }} flex items-center justify-center px-4 h-10 leading-tight bg-white border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                {{ $i }}
              </a>
            </li>
          @endfor
          <li>
            <a href="/page/{{ $paginator->currentPage() + 1 }}"
              class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
          </li>
        </ul>
      </nav>
      @endif
    </div>
  </div>
</main>
@endsection