<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\ListController;

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
Route::get("/page", [JournalController::class, "render_page"]);
Route::get('/journals', [JournalController::class, "list_journals"]);
Route::post('/journals', [JournalController::class, "add_journal"]);
Route::get('/journals/{journal_name}/', [JournalController::class, "list_pages"]);
Route::post('/journals/{journal_name}/', [JournalController::class, "add_page"]);
Route::get('/journals/{journal_name}/{page_num}/', [JournalController::class, "render_page"]);
Route::post('/journals/{journal_name}/{page_num}/', [JournalController::class, "update_page"]);
Route::get('/404', function () {
    return view('404');
});

Route::get('/list/{list_id}', [ListController::class, "render_list"]);
Route::get('/list', [ListController::class, "display_lists"]);
Route::put('/list', [ListController::class, "add_list"]);
Route::put('/list/{list_id}', [ListController::class, "add_list_column"]);
Route::put('/list/{list_id}/{list_col_id}', [ListController::class, "add_list_entry"]);
Route::post('/list/{list_id}', [ListController::class, "delete_list"]);
Route::post('/list/{list_id}/{list_col_id}', [ListController::class, "delete_column"]);
Route::post('/list/{list_id}/{list_col_id}/{list_entry_id}', [ListController::class, "delete_entry"]);
Route::patch('/list/{list_id}', [ListController::class, "edit_list"]);
Route::post('list/{list_id}/{list_col_id}', [ListController::class, "edit_column"]);
Route::post('/list/{list_id}/{list_col_id}/{list_entry_id}', [ListController::class, "edit_entry"]);
// Journal Routes
Route::get('/journals', [JournalController::class, "list_journals"]);
Route::put('/journals', [JournalController::class, "add_journal"]);
Route::delete('/journals/{journal_id}', [JournalController::class, "delete_journal"]);
Route::patch('/journals/{journal_id}', [JournalController::class, "update_journal"]);
Route::get('/journals/{journal_id}', [JournalController::class, "list_pages"]);
Route::put('/journals/{journal_id}', [JournalController::class, "add_page"]);
Route::patch('/journals/{journal_id}/{id}', [JournalController::class, "update_page"]);
Route::get('/journals/{journal_id}/{id}', [JournalController::class, "render_page"]);
Route::delete('/journals/{journal_id}/{id}', [JournalController::class, "delete_page"]);
