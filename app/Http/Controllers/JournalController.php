<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Journal;
use App\Models\Component;
use App\Models\Page;
use Illuminate\Support\Facades\Response;
use LDAP\Result;

class JournalController extends Controller
{
    public function add_journal(Request $request)
    {
        session_start();

        if (!isset($_SESSION['id'])) {
            return Response::json([
                'success' => false,
                'message' => 'You must be logged in to add a journal.'
            ], 401);
        }

        $data = request()->all();

        if (!isset($data['name']) || !isset($data['description']) || count_chars($data['name']) == 0 || count_chars($data['description']) == 0) {
            return Response::json([
                'success' => false,
                'message' => 'Missing Required Fields.'
            ], 400);
        }

        if (strlen($data['name']) > 20) {
            return Response::json([
                'success' => false,
                'message' => 'Name cannot be have more than 300 characters.'
            ], 400);
        }

        if (strlen($data['description']) > 200) {
            return Response::json([
                'success' => false,
                'message' => 'Name cannot be have more than 1000 characters.'
            ], 400);
        }

        $journal = new Journal();
        $journal->name = $data['name'];
        $journal->description = $data['description'];
        $journal->authorId = $_SESSION['id'];
        $journal->save();

        return Response::json([
            'success' => true,
            'data' => $journal
        ], 200);
    }

    public function list_journals()
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::redirectTo('/login');

        $journals = Journal::where('authorId', $_SESSION['id'])->get();

        return Response::view('journals', ['journals' => $journals]);
    }

    public function delete_journal($journal_id)
    {
        session_start();

        if (!isset($_SESSION['id'])) {
            return Response::json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $journal = Journal::where(['id' => $journal_id, 'authorId' => $_SESSION['id']])->first();

        if (!$journal) {
            return Response::json([
                'success' => false,
                'message' => 'Unauthorized.'
            ], 400);
        }

        $journal->delete();

        return Response::json([], 204);
    }

    public function update_journal($journal_id)
    {
        session_start();

        if (!isset($_SESSION['id'])) {
            return Response::json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 400);
        }

        $journal = Journal::where(['id' => $journal_id, 'authorId' => $_SESSION['id']])->first();

        if (!$journal) {
            return Response::json([
                'success' => false,
                'message' => 'Unauthorized.'
            ], 400);
        }

        $data = request()->all();


        if (!isset($data['name']) || !isset($data['description']) || count_chars($data['name']) == 0 || count_chars($data['description']) == 0) {
            return Response::json([
                'success' => false,
                'message' => 'Missing Required Fields.'
            ], 400);
        }

        if (strlen($data['name']) > 20) {
            return Response::json([
                'success' => false,
                'message' => 'Name cannot be have more than 20 characters.'
            ], 400);
        }

        if (strlen($data['description']) > 200) {
            return Response::json([
                'success' => false,
                'message' => 'Name cannot be have more than 200 characters.'
            ], 400);
        }

        $journal->name = $data['name'];
        $journal->description = $data['description'];
        $journal->save();

        return Response::json([
            'success' => true,
            'message' => 'Journal updated.'
        ], 204);
    }

    public function list_pages($journal_id)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::redirectTo('/login');

        $journal = Journal::where(['authorId' => $_SESSION['id'], 'id' => $journal_id])->with(['pages'])->first();

        if (!$journal)
            return Response::redirectTo('/404');

        return Response::view('journal_pages', ['journal' => $journal]);
    }

    public function render_page($journal_id, $page_identifier)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::redirectTo('/login');

        $journal = Journal::where(['authorId' => $_SESSION['id'], 'id' => $journal_id])->with(['pages', 'pages.components'])->first();

        $GLOBALS['page_id'] = $page_identifier;

        if (!$journal)
            return Response::redirectTo('/404');

        $pages = [...array_filter($journal['pages']->toArray(), function ($page) {
            return $page['id'] == $GLOBALS['page_id'];
        })];

        if (count($pages) == 0)
            return Response::redirectTo('/404');

        $components = $pages[0]['components'];

        usort($components, function ($a, $b) {
            return $a['number'] - $b['number'];
        });

        return view('page', ['components' => $components]);
    }

    public function add_page(Request $request, $journal_id)
    {
        session_start();

        if (!isset($_SESSION['id'])) {
            return Response::json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $journal = Journal::where(['authorId' => $_SESSION['id'], 'id' => $journal_id])->with('pages')->first();

        if (!$journal) {
            return Response::json([
                'success' => false,
                'message' => 'Bad Request'
            ], 400);
        }

        $data = $request->all();
        $page = new Page();
        $page->journalId = $journal->id;
        $page->identifier = $data['name'];
        $page->save();

        return Response::json(['success' => true, 'data' => $page], 200);
    }

    public function update_page($journal_id, $page_id)
    {
        session_start();

        if (!isset($_SESSION['id'])) {
            return Response::json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $journal = Journal::where(['id' => $journal_id])->with(['pages'])->first();

        if (!$journal) {
            return Response::json([
                'success' => false,
                'message' => 'Bad Request'
            ], 400);
        }

        $page = $journal->pages->where('id', $page_id)->first();

        if (!$page) {
            return Response::json([
                'success' => false,
                'message' => 'Bad Request'
            ], 400);
        }

        $data = request()->all();
        $page->identifier = $data['name'];
        $page->save();

        return Response::json([], 204);
    }

    public function delete_page($journal_id, $page_id)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::json(['success' => false, 'message' => 'Not Authorized.'], 401);

        $journal = Journal::where(['authorId' => $_SESSION['id'], 'id' => $journal_id])->with(['pages', 'pages.components'])->first();

        if (!$journal)
            return Response::json(['success' => false, 'message' => 'Bad Request'], 400);

        $GLOBALS['page_id'] = $page_id;
        $pages = [...array_filter($journal['pages']->toArray(), function ($page) {
            return $page['id'] == $GLOBALS['page_id'];
        })];

        if (count($pages) == 0)
            return Response::json(['success' => false, 'message' => 'Bad Request'], 401);

        Page::destroy($page_id);
        return Response::json([], 204);
    }

    public function update_page_data($journal_id, $page_id)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::json(['success' => false, 'message' => 'Not Authorized.'], 401);

        $journal = Journal::where(['authorId' => $_SESSION['id'], 'id' => $journal_id])->with(['pages', 'pages.components'])->first();

        if (!$journal)
            return Response::json(['success' => false, 'message' => 'Bad Request'], 400);

        $GLOBALS['page_id'] = $page_id;
        $pages = [...array_filter($journal['pages']->toArray(), function ($page) {
            return $page['id'] == $GLOBALS['page_id'];
        })];

        if (count($pages) == 0)
            return Response::json(['success' => false, 'message' => 'Bad Request'], 401);

        Page::destroy($page_id);
        return Response::json([], 204);
    }
}
