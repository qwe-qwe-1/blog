@extends('app')

@section('content')
<main class="mx-7 lg:mx-6 mt-32 flex-grow">
    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
        @foreach($posts->chunk(3) as $items)
            <div class="grid gap-4">
                @foreach($items as $item)
                <div>
                    <a href="/{{ $item->slug }}">
                        <img class="h-auto max-w-full rounded-lg" src="{{ $item->image }}" alt="{{ $item->image_caption }}">
                    </a>
                </div>
                @endforeach
            </div>
        @endforeach
    </div>
</main>
@endsection
