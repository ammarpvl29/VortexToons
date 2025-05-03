<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
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
    
        if (isset($response['error']) && $response['error'] === true) {
            \Log::error('ComicsController Error:', ['message' => $response['message']]);
            return response()->json([
                'error' => true,
                'message' => $response['message'],
            ], 500);
        }
    
        if (isset($response['data'])) {
            return response()->json($response['data']);
        }
    
        return response()->json([
            'error' => true,
            'message' => 'Unexpected error occurred.',
        ], 500);
    }
}