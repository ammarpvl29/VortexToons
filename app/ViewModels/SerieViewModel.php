<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class SerieViewModel extends ViewModel
{
    public $serie;
    public $comics;

    public function __construct($serie, $comics)
    {
        $this->serie = $serie;
        $this->comics = $comics;
    }

    public function serie()
    {
        return collect($this->serie)->merge([
            'thumbnail' => $this->serie['thumbnail']['path'].'/portrait_uncanny.'.$this->serie['thumbnail']['extension'],
            'urls' => $this->urls($this->serie['urls']),
            'creators' => collect($this->serie['creators']['items'])->take(10),
            'comics' => $this->serie['comics']['returned'],
        ])->only([
            'id', 'title', 'urls', 'startYear', 'endYear', 'thumbnail', 'creators', 'comics', 
        ]);
    }

    public function comics()
    {
        return collect($this->comics)->take(15)->map(function($comic){
            return collect($comic)->merge([
                'thumbnail' => $comic['thumbnail']['path'].'/portrait_uncanny.'.$comic['thumbnail']['extension']
            ])->only([
                'id', 'title', 'thumbnail',
            ]);
        });
    }

    public function urls($urls)
    {
        return collect($urls)->mapWithKeys(function($url){
            return [$url['type'] => $url['url']];
        });
    }
}
