<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\ViewModels\SeriesViewModel;
use App\ViewModels\SerieViewModel;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        $timestamp = time();
        $privateKey = config('services.marvelapi.private_key');
        $publicKey = config('services.marvelapi.public_key');

        $hash = md5($timestamp.$privateKey.$publicKey);

        $offset = ($page - 1) * 50;

        $series = Http::get('https://gateway.marvel.com/v1/public/series', [
            'contains' => 'comic',
            'orderBy' => 'title',
            'limit' => '50',
            'offset' => $offset,
            'ts' => $timestamp,
            'apikey' => $publicKey,
            'hash' => $hash,
        ])->json();

        $totalPages = ceil($series['data']['total']/50);

        abort_if($page > $totalPages, 204);

        $viewModel = new SeriesViewModel(
            $series['data']['results'],
            $page,
            $totalPages,
        );

        return view('series.index', $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $timestamp = time();
        $privateKey = config('services.marvelapi.private_key');
        $publicKey = config('services.marvelapi.public_key');

        $hash = md5($timestamp.$privateKey.$publicKey);

        $serie = Http::get('https://gateway.marvel.com/v1/public/series/'.$id , [
            'ts' => $timestamp,
            'apikey' => $publicKey,
            'hash' => $hash,
        ])->json();

        $comics = Http::get('https://gateway.marvel.com/v1/public/series/'.$id.'/comics' , [
            'ts' => $timestamp,
            'apikey' => $publicKey,
            'hash' => $hash,
        ])->json();

        $viewModel = new SerieViewModel(
            $serie['data']['results'][0],
            $comics['data']['results'],
        );

        return view('series.show', $viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
