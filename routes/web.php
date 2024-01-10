<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', [
        'name' => 'Toto',
    ]);
});

Route::get('/salles', function () {
    return view('salles', [
        'rooms' => [
            [
                'id' => 1,
                'name' => 'chambre 1',
                'price' => 250,
            ],
            [
                'id' => 2,
                'name' => 'chambre 2',
                'price' => 250,
            ],
            [
                'id' => 3,
                'name' => 'chambre 3',
                'price' => 250,
            ],
        ],
    ]);
});
