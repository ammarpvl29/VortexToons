<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = [];

        if(strlen($this->search) >= 2 ){
            $timestamp = time();
            $privateKey = config('services.marvelapi.private_key');
            $publicKey = config('services.marvelapi.public_key');

            $hash = md5($timestamp.$privateKey.$publicKey);

            $searchResults = Http::get('https://gateway.marvel.com/v1/public/comics', [
                'format' => 'comic',
                'formatType' => 'comic',
                'noVariants' => 'false',
                'hasDigitalIssue' => 'false',
                'titleStartsWith' => $this->search,
                'limit' => 8,
                'ts' => $timestamp,
                'apikey' => $publicKey,
                'hash' => $hash,
            ])->json()['data']['results'];

            //dump($searchResults);
        }

        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(8),
        ]);
    }
}
