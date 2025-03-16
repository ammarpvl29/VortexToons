@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-16">
        <div class="random-comics">
            <h2 class="uppercase tracking-wider text-white-500 text-lg font-semibold">Comics of this month</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($comicsLastMonth as $comic)
                    <x-comic-card :comic="$comic" />
                @endforeach
            </div>
        </div>
    </div>
@endsection