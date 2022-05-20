<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\List_;
use App\Models\list_column;
use App\Models\list_entry;
use Illuminate\Support\Facades\Response;

class ListController extends Controller
{
    public function add_list(Request $request){
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

        $list = new List_();
        $list->user_id = $_SESSION['id'];
        $list->name = $request->name;
        $list->subtitle = $request->subtitle;
        $list->save();
    }

    public function display_lists(){
        session_start();

        if (!isset($_SESSION['id']))
        return Response::redirectTo('/login');

        $lists = List_::where('user_id', $_SESSION['id'])->get();

        return Response::view('todo_display', ['lists' => $lists]);
    }

    public function add_list_column(Request $request, $list_id){
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

        $list = List_::where(["user_id" => $_SESSION["id"], "id" => $list_id])->first();

        if(is_null($list)) {
            return "error";
        }

        $list_col = new list_column();
        $list_col->list_id = $list_id;
        $list_col->name = $request->name;
        $list_col->save();

    }

    public function add_list_entry(Request $request, $list_id, $list_col_id){
        session_start();

        if (!isset($_SESSION['id']))
            return Response::redirectTo('/login');

        $list = List_::where(["user_id" => $_SESSION["id"], "id" => $list_id])->with(["list_columns"])->first();
        $col_exists = list_column::find($list_col_id);

        if(is_null($list) || is_null($col_exists)) return "error";

        $list_entry = new list_entry();
        $list_entry->column_id = $list_col_id;
        $list_entry->content = $request->content;
        $list_entry->save();

    }  

    public function render_list($list_id){
        session_start();

        if (!isset($_SESSION['id']))
            return Response::redirectTo('/login');

        $list = List_::where(["user_id" => $_SESSION["id"], "id" => $list_id])->with(['list_columns', 'list_columns.list_entries'])->first();
        var_dump($list);
        return view('todo_tableview', ["list" => $list]);
    }

    public function delete_list($list_id){
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

        $list = List_::where(["user_id" => $_SESSION["id"], "id" => $list_id])->first();
        $list_col = list_column::where("list_id", $list_id)->first();
        $list_entries = list_entry::where("column_id", $list_col_id)->get();
        $list->delete();
        $list_col->delete();
        $list_entries->delete();

        var_dump($list);
    }

    public function delete_column($list_id, $list_col_id){
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');
        $list_exists = List_::find($list_id);
        $col_exists = list_column::find($list_col_id);

        if(is_null($list_exists) || is_null($col_exists)) return "error";

        $list_col = list_column::where(["list_id" => $list_id, "id" => $list_col_id])->first();
        $list_entries = list_entry::where("column_id", $list_col_id)->get();
        $list_col->delete();
        $list_entries->delete();
    }

    public function delete_entry($list_id, $list_col_id, $list_entry_id){
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');
        $list_exists = List_::find($list_id);
        $col_exists = list_column::find($list_col_id);
        $entry_exists = list_entry::find($list_entry_id);

        if(is_null($list_exists) || is_null($col_exists) || is_null($col_exists)) return "error";
        
        $list_entry = list_entry::where("column_id", $list_col_id)->first();
        $list_entry->delete();

        var_dump($list_entry);
    }

    public function edit_list(Request $request, $list_id){
        session_start();
        if (!isset($_SESSION['id']))
        return redirect('/login');

        $list = List_::findorFail($list_id);

        $list->name = $request->name;
        $list->subtitle = $request->subtitle;
        $list->save();
    }

    public function edit_column(Request $request, $list_id, $list_col_id){
        session_start();
        if (!isset($_SESSION['id']))
        return redirect('/login');

        $list = List_::findorFail($list_id);
        $list_col = list_column::findorFail($list_col_id);

        $list_col->name = $request->name;
        $list_col->save();
    }

    public function edit_entry(Request $request, $list_id, $list_col_id, $list_entry_id){
        session_start();
        if (!isset($_SESSION['id']))
        return redirect('/login');

        $list = List_::findorFail($list_id);
        $list_col = list_column::findorFail($list_col_id);
        $list_entry = list_column::findorFail($list_entry_id);

        $list_entry->content = $request->content;
        $list_entry->save();
    }
}
