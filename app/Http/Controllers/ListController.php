<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\List_;
use App\Models\list_column;
use App\Models\list_entry;
use Illuminate\Support\Facades\Response;

class ListController extends Controller
{
    public function display_lists()
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::json([
                'success' => false,
                'message' => 'You must be logged in to add a list.'
            ], 401);

        $lists = List_::where('user_id', $_SESSION['id'])->get();

        return Response::view('lists', ['lists' => $lists]);
    }

    public function render_list(Request $request, $list_id)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::json([
                'success' => false,
                'message' => 'You must be logged in to add a journal.'
            ], 401);

        $list = List_::where(["user_id" => $_SESSION["id"], "id" => $list_id])->with(['list_columns', 'list_columns.list_entries'])->first();

        if (!$list) return view('404');

        $data = $request->all();

        if (isset($data['view']) && strcmp($data['view'], 'table') == 0) {
            return Response::view('list-table', ["list" => $list]);
        }

        return view('list-board', ["list" => $list]);
    }

    public function add_list(Request $request)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'subtitle' => 'required',
            'template' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages(),
            ], 400);
        }

        $list = new List_();
        $list->user_id = $_SESSION['id'];
        $list->name = $request->input('name');
        $list->subtitle = $request->input('subtitle');
        $list->save();

        if (strcmp($request->input('template'), 'none') !== 0) {
            $this->create_template_list($list, $request->input('template'));
        }

        return response()->json([
            'list' => $list,
        ]);
    }

    public function update_list(Request $request, $list_id)
    {
        session_start();

        if (!isset($_SESSION['id']))
        return Response::json([
            'success' => false,
            'message' => 'You must be logged in to access the list.'
        ], 401);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'subtitle' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages(),
            ], 400);
        }

        $list = List_::where(["user_id" => $_SESSION['id'], "id" => $list_id])->first();

        if (!$list) {
            return response()->json([
                'message' => "List was not found",
            ], 404);
        }

        $list->name = $request->input("name");
        $list->subtitle = $request->input("subtitle");
        $list->update();

        return response()->json([
            'message' => "List was updated successfully",
        ], 200);
    }

    public function delete_list($list_id)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

        $list = List_::where(["user_id" => $_SESSION['id'], "id" => $list_id])->with(['list_columns', 'list_columns.list_entries'])->first();

        if (!$list) {
            return response()->json([
                'message' => "List does not exist",
            ], 404);
        }

        foreach ($list->list_columns as $column) {
            foreach ($column->list_entries as $entry) {
                $entry->delete();
            }

            $column->delete();
        }

        $list->delete();

        return response()->json([
            'message' => "List deleted successfully",
        ], 200);
    }

    public function add_column(Request $request, $list_id)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages(),
            ], 400);
        }

        $list = List_::where(["user_id" => $_SESSION["id"], "id" => $list_id])->first();

        if (is_null($list)) {
            return response()->json([
                'errors' => ['Not authorized'],
            ], 400);
        }

        $list_col = new list_column();
        $list_col->list_id = $list_id;
        $list_col->name = $request->input("name");
        $list_col->save();

        return response()->json(['column' => $list_col], 200);
    }

    public function delete_column($list_id, $list_col_id)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

        $list = List_::where(["user_id" => $_SESSION['id'], 'id' => $list_id])->with(['list_columns', 'list_columns.list_entries'])->first();

        if (!$list) {
            return response()->json([
                'errors' => ['List does not exist'],
            ], 400);
        }

        $list_col = $list->list_columns->where('id', $list_col_id)->first();

        if (!$list_col) {
            return response()->json([
                'errors' => ['List Column does not exist'],
            ], 400);
        }

        foreach ($list_col->list_entries as $entry) {
            $entry->delete();
        }

        $list_col->delete();

        return response()->json([
            'message' => "List Column deleted successfully",
        ], 200);
    }

    public function edit_column(Request $request, $list_id, $list_col_id)
    {
        session_start();
        if (!isset($_SESSION['id']))
            return redirect('/login');

        $list = List_::where(["user_id" => $_SESSION['id'], 'id' => $list_id])->with(['list_columns'])->first();

        if (!$list) {
            return response()->json([
                'errors' => ['List does not exist'],
            ], 400);
        }

        $list_col = $list->list_columns->where('id', $list_col_id)->first();

        if (!$list_col) {
            return response()->json([
                'errors' => ['List column not exist'],
            ], 400);
        }

        $list_col->name = $request->name;
        $list_col->save();

        return response()->json([
            'message' => 'List Column updated!',
        ], 200);
    }

    public function add_list_entry(Request $request, $list_id)
    {
        session_start();

        if (!isset($_SESSION['id']))
            return Response::redirectTo('/login');

        $list = List_::where(["user_id" => $_SESSION["id"], "id" => $list_id])->with(["list_columns"])->first();

        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'col_id' => 'required'
        ]);

        if (is_null($list)) {
            return response()->json([
                'errors' => ['Not authorized'],
            ], 400);
        }

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages(),
            ], 400);
        }

        $list->list_columns;

        $col = list_column::where(["list_id" => $list_id, "id" => $request->input("col_id")])->first();

        if (is_null($col)) {
            return response()->json([
                'errors' => ['Not authorized'],
            ], 400);
        }

        $list_entry = new list_entry();
        $list_entry->column_id = $request->input("col_id");
        $list_entry->content = $request->input("content");
        $list_entry->save();

        return response()->json([
            'entry' => $list_entry,
        ], 200);
    }

    public function update_entry(Request $request, $list_id, $list_col_id, $list_entry_id)
    {
        session_start();

        if (!isset($_SESSION['id']));

        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'col_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages(),
            ], 400);
        }

        $list = List_::where(["user_id" => $_SESSION['id'], "id" => $list_id])->with(['list_columns', 'list_columns.list_entries'])->first();

        if (!$list) {
            return response()->json([
                'errors' => ['List does not exist'],
            ], 400);
        }

        $list_col = $list->list_columns->where('id', $list_col_id)->first();

        if (!$list_col) {
            return response()->json([
                'errors' => ['List Column does not exist'],
            ], 400);
        }

        $list_entry = $list_col->list_entries->where('id', $list_entry_id)->first();

        if (!$list_entry) {
            return response()->json([
                'errors' => ["List Entry does not exist"],
            ], 400);
        }

        $list_entry->content = $request->input("content");
        $list_entry->column_id = $request->input("col_id");
        $list_entry->update();

        return response()->json([
            'message' => "List Entry was updated successfully",
        ], 200);
    }

    public function delete_entry($list_id, $list_col, $entry_id)
    {
        session_start();

        if (!isset($_SESSION['id']));

        $list = List_::where(['id' => $list_id])->with(['list_columns', 'list_columns.list_entries'])->first();

        if (!$list) {
            return response()->json([
                'errors' => ["List does not exist"],
            ], 400);
        }

        $list_col = $list->list_columns->where('id', $list_col)->first();


        if (!$list_col) {
            return response()->json([
                'errors' => ["List Column does not exist"],
            ], 400);
        }

        $list_entry = $list_col->list_entries->where('id', $entry_id)->first();

        if (!$list_entry) {
            return response()->json([
                'errors' => ["List Entry does not exist"],
            ], 400);
        }

        $list_entry->delete();

        return response()->json([
            'message' => "Entry deleted successfully",
        ], 200);
    }

    public function create_template_list($list, $template) {
        $column_names = [];

        if (strcmp($template, 'todo') == 0) {
            $column_names = ["To-do", "Doing", "Review", "Done"];
        } else if (strcmp($template, 'watch') == 0) {
            $column_names = ["Watched", "Watching"];
        } else if (strcmp($template, 'reading') == 0) {
            $column_names = ["To Read", "Reading", "Read"];
        }

        foreach ($column_names as $column_name) {
            $list_col = new list_column();
            $list_col->list_id = $list->id;
            $list_col->name = $column_name;
            $list_col->save();
        }
    }
}
