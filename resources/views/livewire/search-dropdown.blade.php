<div class="relative mt-3 md:mt-0" x-data="{ isOpen : true }" @click.away="isOpen = false">
    <input 
        wire:model.debounce.500ms="search" 
        type="text" 
        class="bg-gray-800 text-sm rounded-full w-64 px-4 py-1 focus:outline-none focus:shadow-outline" placeholder="Search..."
        x-ref="search"
        @keydown.window.prevent.slash="$refs.search.focus()"
        @focus="isOpen = true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false">
    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>
    @if (strlen($search) >= 2)
        <div class="z-50 absolute bg-gray-800 rounded text-sm w-64 mt-2" 
             x-show.transition.opacity="isOpen">
            @if ($searchResults->count() > 0)
                <ul>
                    @foreach ($searchResults as $result)
                    <li class="border-b border-gray-700">
                        <a href="{{ url("/comics/".$result['id'] ) }}" class="block hover:bg-gray-700 px-3 py-3 flex items-center" @if ($loop->last) @keydown.tab="isOpen = false" @endif >
                            <img src="{{ $result['thumbnail']['path'].'/portrait_xlarge.'.$result['thumbnail']['extension'] }}" alt="{{ $result['title'].' cover' }}" class="w-8">
                            <span class="ml-4">{{ $result['title'] }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">
                    No results for "{{ $search }}"
                </div>
            @endif
        </div>
    @endif
</div>