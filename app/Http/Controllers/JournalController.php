<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Journal;
use App\Models\Component;
use App\Models\Page;
use Illuminate\Support\Facades\Response;

class JournalController extends Controller
{
    public function add_journal()
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::json([
                'success' => false,
                'message' => 'You must be logged in to add a journal.'
            ], 401);
    }

    public function list_journals()
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::redirectTo('/login');

        $journals = Journal::where('id', $_SESSION['id'])->get();

        return Response::view('journals', ['journals' => $journals]);
    }

    public function delete_journal($journal_id)
    {
        session_start();

        if (!isset($_SESSION['id'])) {
            return Response::json([
                'success' => false,
                'message' => 'You must be logged in to add a journal.'
            ], 401);
        }

        $journal = Journal::where(['name' => $journal_id, 'authorId' => $_SESSION['id']])->first();

        if (!$journal) {
            return Response::json([
                'success' => false,
                'message' => 'Unauthorized.'
            ], 401);
        }

        $journal->delete();

        return Response::json([
            'success' => true,
            'message' => 'Journal deleted.'
        ], 200);
    }

    public function list_pages($journal_id)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::redirectTo('/login');

        $journal = Journal::where(['authorId' => $_SESSION['id'], 'id' => $journal_id])->with(['pages'])->first();

        if (!$journal)
            return Response::redirectTo('/404');

        return Response::view('journal_pages', ['pages' => $journal['pages']]);
    }

    public function render_page($journal_id, $page_identifier)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::redirectTo('/login');

        $journal = Journal::where(['authorId' => $_SESSION['id'], 'id' => $journal_id])->with(['pages', 'pages.components'])->first();

        $GLOBALS['page_identifier'] = $page_identifier;

        if (!$journal)
            return Response::redirectTo('/404');

        $pages = [...array_filter($journal['pages']->toArray(), function ($page) {
            return $page['identifier'] == $GLOBALS['page_identifier'];
        })];

        if (count($pages) == 0)
            return Response::redirectTo('/404');

        $components = $pages[0]['components'];

        usort($components, function ($a, $b) {
            return $a['number'] - $b['number'];
        });

        return view('page', ['components' => $components]);
    }

    public function add_page()
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::redirectTo('/login');

        $journals = Journal::where('id', $_SESSION['id'])->first()->pages();
    }

    public function update_page()
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::redirectTo('/login');

        $journals = Component::where('id', $_SESSION['id'])->first()->pages();
    }

    public function delete_page($journal_id, $page_id)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::json(['success' => false, 'message' => 'Not logged in.'], 401);

        $journal = Journal::where(['authorId' => $_SESSION['id'], 'name' => $journal_id])->with(['pages', 'pages.components'])->first();

        if (!$journal)
            return Response::json(['success' => false, 'message' => 'Not Authorized.'], 403);

        $GLOBALS['page_id'] = $page_id;
        $pages = [...array_filter($journal['pages']->toArray(), function ($page) {
            return $page['id'] == $GLOBALS['page_id'];
        })];

        if (count($pages) == 0)
            return Response::json(['success' => false, 'message' => 'Journal does not contain the specified page.'], 403);

        Page::destroy($page_id);
        return Response::json([], 204);
    }
}
