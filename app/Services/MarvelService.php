<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MarvelService
{
    protected $baseUrl;
    protected $publicKey;
    protected $privateKey;

    public function __construct()
    {
        $this->baseUrl = 'https://gateway.marvel.com/v1/public';
        $this->publicKey = env('MARVEL_PUBLIC_KEY');
        $this->privateKey = env('MARVEL_PRIVATE_KEY');
    }

    public function getComics()
    {
        $timestamp = time();
        $hash = md5($timestamp . $this->privateKey . $this->publicKey);
    
        // Log the request URL and parameters for debugging
        \Log::info('Marvel API Request:', [
            'url' => "{$this->baseUrl}/comics",
            'params' => [
                'apikey' => $this->publicKey,
                'ts' => $timestamp,
                'hash' => $hash,
            ],
        ]);
    
        $response = Http::get("{$this->baseUrl}/comics", [
            'apikey' => $this->publicKey,
            'ts' => $timestamp,
            'hash' => $hash,
        ]);
    
        // Log the response for debugging
        \Log::info('Marvel API Response:', $response->json());
    
        if ($response->successful()) {
            return $response->json();
        } else {
            \Log::error('Marvel API Error:', $response->json());
            return [
                'error' => true,
                'message' => 'Failed to fetch comics from Marvel API.',
            ];
        }
    }
}