<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;

class ComicsViewModel extends ViewModel
{
    public $comicsLastMonth;

    public function __construct($comicsLastMonth)
    {
        $this->comicsLastMonth = $comicsLastMonth;
    }

    public function comicsLastMonth()
    {
        if (empty($this->comicsLastMonth)) {
            return collect(); // Return an empty collection if no data is available
        }
    
        return collect($this->comicsLastMonth)->map(function($comic) {
            return collect($comic)->merge([
                'thumbnail' => $comic['thumbnail']['path'].'/portrait_uncanny.'.$comic['thumbnail']['extension'],
                'dates' => Carbon::parse($comic['dates'][0]['date'])->format('M d, Y')
            ])->only([
                'id', 'title', 'dates', 'thumbnail',
            ]);
        });
    }
}
