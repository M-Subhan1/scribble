<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\CalendarController;

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
    session_start();

    if (isset($_SESSION['id'])) {
        redirect('/journals');
    }

    if (array_key_exists('success', $_GET) && $_GET['success'] == 'true')
        return view('login', ['alert' => (object)array('type' => 'success', 'message' => 'Account Created!')]);
    else  return view('login');
});

Route::get("/register", function () {
    session_start();

    if (isset($_SESSION['id'])) {
        redirect('/journals');
    }

    return view("register", [
        'is_authorized' => isset($_SESSION['id'])
    ]);
});

Route::get('pricing', function () {
    session_start();

    return view("pricing", [
        'is_authorized' => isset($_SESSION['id'])
    ]);
});

Route::get('/', function () {
    session_start();

    return view("home", [
        'is_authorized' => isset($_SESSION['id'])
    ]);
});

Route::get('about-us', function () {
    session_start();

    return view("about-us", [
        'is_authorized' => isset($_SESSION['id'])
    ]);
});

Route::get('features', function () {
    session_start();

    return view("features", [
        'is_authorized' => isset($_SESSION['id'])
    ]);
});

Route::get('test', function () {
    return view("test");
});

Route::get("/logout", [AuthController::class, "logout"]);
Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);
Route::get("/page", [JournalController::class, "render_page"]);

// List Routes
Route::get('/lists', [ListController::class, "display_lists"]);
Route::put('/lists/', [ListController::class, "add_list"]);
Route::get('/lists/{list_id}', [ListController::class, "render_list"]);
Route::patch('/lists/{list_id}', [ListController::class, "update_list"]);
Route::delete('/lists/{list_id}', [ListController::class, "delete_list"]);
Route::put('/lists/{list_id}', [ListController::class, "add_column"]);
Route::patch('/lists/{list_id}/{col_id}', [ListController::class, "edit_column"]);
Route::delete('/lists/{list_id}/{col_id}', [ListController::class, "delete_column"]);
Route::put('/lists/{list_id}/{col_id}', [ListController::class, "add_list_entry"]);
Route::delete('/lists/{list_id}/{col_id}/{entry_id}', [ListController::class, "delete_entry"]);
Route::patch('/lists/{list_id}/{col_id}/{entry_id}', [ListController::class, "update_entry"]);

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

//Calendar routes
Route::get('/calendar/', [CalendarController::class, "display_calendar"]);
Route::put('/calendar/{calendar_id}', [CalendarController::class, "create_event"]);
Route::patch('/calendar/{calendar_id}/{event_id}', [CalendarController::class, "edit_event"]);
Route::delete('/calendar/{calendar_id}/{event_id}', [CalendarController::class, "delete_event"]);
