<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ComicsController@index')->name('comics.index');
Route::get('/comics/{comic}', 'ComicsController@show')->name('comics.show');

Route::get('/chatbot', function () {
    return view('chatbot'); // Load chatbot.blade.php
});

Route::post('/chatbot/message', [ChatbotController::class, 'handleChatMessage']);

Route::get('/characters', 'CharactersController@index')->name('characters.index');
Route::get('/characters/page/{page?}', 'CharactersController@index')->name('characters.index');
Route::get('/characters/{character}', 'CharactersController@show')->name('characters.show');

Route::get('/series', 'SeriesController@index')->name('series.index');
Route::get('/series/page/{page?}', 'SeriesController@index')->name('series.index');
Route::get('/series/{serie}', 'SeriesController@show')->name('series.show');

// Quick test route to verify Marvel API keys and hash generation
Route::get('/test-hash', function () {
    $timestamp = time();
    $privateKey = config('services.marvelapi.private_key');
    $publicKey = config('services.marvelapi.public_key');
    $hash = md5($timestamp . $privateKey . $publicKey);

    return response()->json([
        'timestamp' => $timestamp,
        'public_key' => $publicKey,
        'private_key' => $privateKey,
        'hash' => $hash,
    ]);
});