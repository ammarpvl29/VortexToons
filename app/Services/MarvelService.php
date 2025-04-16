<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MarvelService
{
    public function getComics()
    {
        return Http::withOptions(config('services.marvel'))
            ->get('comics', [
                'format' => 'comic',
                'formatType' => 'comic',
                'dateDescriptor' => 'thisMonth',
                'orderBy' => 'title',
                'limit' => 10,
                'ts' => time(), // Timestamp
                'apikey' => config('services.marvel.key'), // Add to config later
                'hash' => md5(time() . config('services.marvel.private_key') . config('services.marvel.key')),
            ]);
    }
}