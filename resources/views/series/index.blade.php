@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-16">
        <div class="series">
            <h2 class="uppercase tracking-wider text-white-500 text-lg font-semibold">Series</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($series as $serie)
                    <div class="serie mt-8">
                        <a href="{{ url("/series/".$serie['id'] ) }}"><img src="{{ $serie['thumbnail'] }}" alt="{{ $serie['title'].' cover' }}" class="hover:opacity-75 transition ease-in-out duration-150"></a>
                        <div class="mt-2">
                            <a href="{{ url("/series/".$serie['id'] ) }}" class="text-lg mt-2 hover:text-gray-300">{{ $serie['title'] }}</a>
                            <div class="text-sm text-gray-400">{{ $serie['startYear'] }} - {{ $serie['endYear'] }} </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="scroller-status my-8">
            <div class="flex justify-center">
                <div class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</div>
            </div>
            <div class="infinite-scroll-last">
                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4" role="alert">
                    <p>End of content.</p>
                </div>
            </div>
            <p class="infinite-scroll-error">Error</p>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>

    <script>
        var elem = document.querySelector('.grid');
        var infScroll = new InfiniteScroll( elem, {
        // options
        path: '/series/page/@{{#}}',
        append: '.serie',
        status: '.scroller-status',
        });
    </script>
@endsection