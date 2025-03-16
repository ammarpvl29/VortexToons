<div class="mt-8">
    <a href="{{ url("/comics/".$comic['id'] ) }}">
    <img src="{{ $comic['thumbnail'] }}" alt="{{ $comic['title'].' Cover' }}" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="{{ url("/comics/".$comic['id'] ) }}" class="text-lg mt-2 hover:text-gray-300">{{ $comic['title'] }}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <span><i class="far fa-calendar-alt"></i></span>
            <span class="ml-2">{{ $comic['dates'] }}</span>
        </div>
    </div>
</div>