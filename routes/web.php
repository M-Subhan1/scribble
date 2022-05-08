<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Response;
/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", function () {
    if (array_key_exists('success', $_GET) && $_GET['success'] == 'true')
        return view('login', ['alert' => (object)array('type' => 'success', 'message' => 'Account Created!')]);

    return view("login");
});

Route::get("/register", function () {
    return view("register");
});


Route::post("/register", [AuthController::class , "register"]);
Route::post("/login", [AuthController::class , "login"]);
