<?php

namespace App\Http\Controllers;

use App\Services\MarvelService;

class ComicController extends Controller
{
    protected $marvelService;

    public function __construct(MarvelService $marvelService)
    {
        $this->marvelService = $marvelService;
    }

    public function index()
    {
        $response = $this->marvelService->getComics();
        return $response->json(); // Returns decoded JSON response
    }
}