<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class SeriesViewModel extends ViewModel
{
    public $series;
    public $page;
    public $totalPages;

    public function __construct($series, $page, $totalPages)
    {
        $this->series = $series;
        $this->page = $page;
        $this->totalPages = $totalPages;
    }

    public function series()
    {
        return collect($this->series)->map(function($serie){
            return collect($serie)->merge([
                'thumbnail' => $serie['thumbnail']['path'].'/portrait_uncanny.'.$serie['thumbnail']['extension'],
            ])->only([
                'id', 'title', 'thumbnail', 'startYear', 'endYear',
            ]);
        });
    }

    public function previous()
    {
        return $this->page > 1 ? $this->page - 1 :  null;
    }

    public function next()
    {
        return $this->page < $this->totalPages ? $this->page + 1 :  null;
    }
}
