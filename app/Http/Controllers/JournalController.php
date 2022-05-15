<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Journal;
use App\Models\Component;
use Illuminate\Support\Facades\Response;

class JournalController extends Controller
{
    public function list_journals()
    {
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

        $journals = Journal::where('id', $_SESSION['id'])->get();

        return Response::json($journals);
    }

    public function add_journal()
    {
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');
    }

    public function list_pages($journal_name)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

        $journal = Journal::where(['id' => $_SESSION['id'], 'name' => $journal_name])->with(['pages'])->first();

        if (!$journal || !$journal->pages)
            route('/404');

        return Response::json($journal->pages);
    }

    public function add_page()
    {
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

        $journals = Journal::where('id', $_SESSION['id'])->first()->pages();
    }

    public function render_page($journal_name, $page_num)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

        $journal = Journal::where(['authorId' => $_SESSION['id'], 'name' => $journal_name])->with(['pages', 'pages.components'])->first();

        $GLOBALS['page_num'] = $page_num;

        if (!$journal || count($journal['pages']) < $page_num)
            route('/404');

        $pages = [...array_filter($journal['pages']->toArray(), function ($page) {
            return $page['number'] == $GLOBALS['page_num'];
        })];

        if (count($pages) == 0)
            route('/404');

        $components = $pages[0]['components'];

        usort($components, function ($a, $b) {
            return $a['number'] - $b['number'];
        });

        return view('page', ['components' => $components]);
    }

    public function update_page()
    {
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

        $journals = Component::where('id', $_SESSION['id'])->first()->pages();
    }
}
