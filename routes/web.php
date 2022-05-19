<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JournalController;

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

Route::get("/logout", [AuthController::class, "logout"]);
Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);

// Journal Routes
Route::get('/journals', [JournalController::class, "list_journals"]);
Route::put('/journals', [JournalController::class, "add_journal"]);
Route::delete('/journals/{journal_id}', [JournalController::class, "delete_journal"]);
Route::patch('/journals/{journal_id}', [JournalController::class, "update_journal"]);
Route::get('/journals/{journal_id}', [JournalController::class, "list_pages"]);
Route::put('/journals/{journal_id}', [JournalController::class, "add_page"]);
Route::patch('/journals/{journal_id}/{identifier}', [JournalController::class, "update_page"]);
Route::get('/journals/{journal_id}/{id}', [JournalController::class, "render_page"]);
Route::delete('/journals/{journal_id}/{id}', [JournalController::class, "delete_page"]);
