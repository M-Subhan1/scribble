<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Response;
/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::get('/dashboard', function () {
    session_start();
    // array_key_exists('account', $_SESSION) ? $account = $_SESSION['account'];
    if (array_key_exists('email', $_SESSION) && $_SESSION['email'] != null && $_SESSION['is_blocked'] == false && $_SESSION['is_verified'] == true) {
        return view('dashboard', ['alert' => (object)array('type' => 'success', 'message' => 'Welcome back, ' . $_SESSION['first_name'] . '!')]);
    }

    return redirect('/login');
});

Route::get("/login", function () {
    if (array_key_exists('success', $_GET) && $_GET['success'] == 'true')
        return view('login', ['alert' => (object)array('type' => 'success', 'message' => 'Account Created!')]);

    return view("login");
});

Route::get("/register", function () {
    return view("register");
});

Route::get("/logout", function () {
    session_start();
    session_unset();
    session_destroy();

    return redirect('/login');
});

Route::post("/register", [AuthController::class , "register"]);
Route::post("/login", [AuthController::class , "login"]);
