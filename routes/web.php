<?php

// use App\Http\Middleware\CheckMembership;

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});

$movies = [];

Route::get('/movie', function () use ($movies) {

    return $movies;
});

Route::group(
    [
        'middleware' => ['isAuth'],
        'prefix' => 'movie'
    ],
    function () use ($movies) {
        Route::get('/', [MovieController::class, 'index']);
        Route::get('/{id}', function ($id) use ($movies) {
            return $movies[$id];
        })->middleware(['isMember']);

        Route::post('/', function () use ($movies) {
            $movies[] = [
                'title' => request('title'),
                'genre' => request('genre'),
                'year' => request('year')
            ];
            return $movies;
        });

        Route::put('/{id}', function ($id) use ($movies) {
            $movies[$id]['title'] = request('title');
            $movies[$id]['year'] = request('year');
            $movies[$id]['genre'] = request('genre');
            return $movies;
        });
        Route::patch('/{id}', function ($id) use ($movies) {
            $movies[$id]['title'] = request('title');
            $movies[$id]['year'] = request('year');
            $movies[$id]['genre'] = request('genre');
            return $movies;
        });
        Route::delete('/{id}', function ($id) use ($movies) {
            unset($movies[$id]);
            return $movies;
        });
    }

);



Route::get('/pricing', function () {
    return 'please buy a membership';
});
Route::get('/login', function () {
    return 'Halaman Login';
});
