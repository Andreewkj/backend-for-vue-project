<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/users', function () {
    return User::all();
});

Route::post('/user', function (Request $request) {
    $request->validate(
        [
            'firstName' => 'required|string',
            'lastName'  => 'required|string',
            'email'     => 'required|string|email|unique:users',
            'password'  => 'required|string|min:6'
        ],
        [
            'firstName.required' => 'O campo nome é obrigatório',
            'email.require'      => 'Email é obrigatório',
        ]
    );
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
