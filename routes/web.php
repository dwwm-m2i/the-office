<?php

use Illuminate\Http\Request;
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


Route::get('/formulaire', function () {
    return view('formulaire');
});

Route::post('/formulaire', function (Request $request) {
    $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|numeric|min:1',
    ]);
});
