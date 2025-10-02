<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public $movies;

    public function __construct()
    {
        for ($i = 0; $i < 10; $i++) {
            $this->movies[] = [
                'title' => 'Movie Controller ' . $i,
                'year' => '2022',
                'genre' => 'action'

            ];
        }
    }

    public function index()
    {
        return $this->movies;
    }
}
