<?php

use Illuminate\Http\Request;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// Authentification
Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

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

Route::get('/salle/{id}', function ($id) {
    return view('salle-detail', ['salleId' => $id]);
});
