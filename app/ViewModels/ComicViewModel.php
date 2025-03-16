<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;

class ComicViewModel extends ViewModel
{
    public $comic;
    public $characters;

    public function __construct($comic, $characters)
    {
        $this->comic = $comic;
        $this->characters = $characters;
    }

    public function comic()
    {
        return collect($this->comic)->merge([
            'thumbnail' => $this->comic['thumbnail']['path'].'/portrait_uncanny.'.$this->comic['thumbnail']['extension'],
            'dates' => Carbon::parse($this->comic['dates'][0]['date'])->format('M d, Y'),
            'prices' => $this->prices($this->comic['prices']),
            'creators' => collect($this->comic['creators']['items']),
            'urls' => $this->urls($this->comic['urls']),
        ])->only([
            'id', 'title', 'dates', 'pageCount', 'prices', 'thumbnail', 'description', 'creators', 'urls',
        ]);
    }

    public function characters()
    {
        return collect($this->characters)->map(function($character){
            return collect($character)->merge([
                'thumbnail' => $character['thumbnail']['path'].'/portrait_uncanny.'.$character['thumbnail']['extension']
            ])->only([
                'id', 'name', 'thumbnail',
            ]);
        });
    }

    public function prices($prices)
    {
        return collect($prices)->mapWithKeys(function($price){
            return [$price['type'] => $price['price']];
        });
    }

    public function urls($urls)
    {
        return collect($urls)->mapWithKeys(function($url){
            return [$url['type'] => $url['url']];
        });
    }
}
