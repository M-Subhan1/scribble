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
    public function add_list(Request $request){
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'subtitle' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else{
            $list = new List_();
            $list->user_id = $_SESSION['id'];
            $list->name = $request->input('name');
            $list->subtitle = $request->input('subtitle');
            $list->save();
            return response()->json([
                'status'=> 200,
                'message'=> "List Created Successfully!",
            ]);
        }

        // return view("todo_display");
    }

    public function display_lists(){
        session_start();

        if (!isset($_SESSION['id']))
            return Response::json([
                'success' => false,
                'message' => 'You must be logged in to add a journal.'
            ], 401);

        $lists = List_::where('user_id', $_SESSION['id'])->get();

        return Response::view('todo_display', ['lists' => $lists]);
    }

    public function add_list_column(Request $request, $list_id){
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

            $validator = Validator::make($request->all(), [
                'name'=> 'required',
            ]);
    
            if($validator->fails()){
                return response()->json([
                    'status' => 400,
                    'errors' => $validator->messages(),
                ]);
            }

        $list = List_::where(["user_id" => $_SESSION["id"], "id" => $list_id])->first();

        if(is_null($list)) {
            return "error";
        }

        $list_col = new list_column();
        $list_col->list_id = $list_id;
        $list_col->name = $request->input("name");
        $list_col->save();
    }

    public function add_list_entry(Request $request, $list_id){
        session_start();

        if (!isset($_SESSION['id']))
            return Response::redirectTo('/login');

        $list = List_::where(["user_id" => $_SESSION["id"], "id" => $list_id])->with(["list_columns"])->first();
        if(is_null($list)) return "error";

        $validator = Validator::make($request->all(), [
            'content'=> 'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else{
            $status = $request->input("status");
            $col = list_column::where(["list_id" => $list_id, "name" => $status])->first();
    
            $list_entry = new list_entry();
            $list_entry->column_id = $col->id;
            $list_entry->content = $request->input("content");
            $list_entry->save();
            return response()->json([
                'status'=> 200,
                'message'=> "Entry Added Successfully!",
            ]);
        }

    }  

    public function render_list($list_id){
        session_start();

        if (!isset($_SESSION['id']))
        return Response::json([
            'success' => false,
            'message' => 'You must be logged in to add a journal.'
        ], 401);

        $list = List_::where(["user_id" => $_SESSION["id"], "id" => $list_id])->with(['list_columns', 'list_columns.list_entries'])->first();

        // foreach($list->list_columns as $column){
        //     foreach($list->list_entries as $entry){
        //         var_dump(entry->content);
        //     }
        // }
 
        // return Response::view('todo_tableview', ["list" => $list]);
        return view('todo_boardview', ["list" => $list]);
    }

    public function delete_list($list_id){
        session_start();

        if (!isset($_SESSION['id']))
            return redirect('/login');

        $list = List_::where(["user_id" => $_SESSION['id'], "id" => $list_id])->with(['list_columns', 'list_columns.list_entries'])->first();
        
        foreach($list->list_columns as $column){
            foreach($column->list_entries as $entry){
                $entry->delete();
            }
            $column->delete();
        }
        $list->delete();

        return response()->json([
            'status'=> 200,
            'message'=> "List deleted successfully",
        ]);

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

    // public function delete_entry($list_id, $list_col_id, $list_entry_id){
    //     session_start();

    //     if (!isset($_SESSION['id']))
    //         return redirect('/login');
    //     $list_exists = List_::find($list_id);
    //     $col_exists = list_column::find($list_col_id);
    //     $entry_exists = list_entry::find($list_entry_id);

    //     if(is_null($list_exists) || is_null($col_exists) || is_null($col_exists)) return "error";
        
    //     $list_entry = list_entry::where("column_id", $list_col_id)->first();
    //     $list_entry->delete();

    //     var_dump($list_entry);
    // }

    public function edit_list($list_id){
        session_start();
        if (!isset($_SESSION['id']))
        return redirect('/login');

        $list = List_::find($list_id);

        if($list){
            return response()->json([
                'status'=> 200,
                'list'=> $list,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'message'=> "List was not found",
            ]);
        }
    }

    public function update_list(Request $request, $list_id){
        session_start();

        if (!isset($_SESSION['id']));
            // return redirect('/login');

        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'subtitle' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else{
            $list = List_::find($list_id);

            if($list){
                $list->name = $request->input("name");
                $list->subtitle = $request->input("subtitle");
                $list->update();
                return response()->json([
                    'status'=> 200,
                    'message'=> "List was updated successfully",
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'message'=> "List was not found",
                ]);
            }
        }
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

        $list = List_::find($list_id);
        $list_col = list_column::find($list_col_id);
        $list_entry = list_entry::find($list_entry_id);

        if($list && $list_col && $list_entry){
            return response()->json([
                'status'=> 200,
                'list'=> $list,
                'column' => $list_col,
                'entry' => $list_entry,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'message'=> "List was not found",
            ]);
        }

    }

    public function update_entry(Request $request, $list_id, $list_col_id, $list_entry_id){
        session_start();

        if (!isset($_SESSION['id']));
            // return redirect('/login');

        $validator = Validator::make($request->all(), [
            'content'=> 'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else{
            $list = List_::find($list_id);
            $list_col = list_column::find($list_col_id);
            $list_entry = list_entry::find($list_entry_id);

            if($list && $list_col && $list_entry){
                $status = $request->input("status");
                $col = list_column::where(["list_id" => $list_id, "name" => $status])->first();

                $list_entry->content = $request->input("content");
                $list_entry->column_id = $col->id;
                $list_entry->update();
                return response()->json([
                    'status'=> 200,
                    'message'=> "List was updated successfully",
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'message'=> "List was not found",
                ]);
            }
        }
    }

    public function delete_entry($list_entry_id){
        session_start();

        if (!isset($_SESSION['id']));
            // return redirect('/login');

            $entry = list_entry::find($list_entry_id);
            $entry->delete();
            return response()->json([
                'status'=> 200,
                'message'=> "Entry deleted successfully",
            ]);
    }

    public function add_list_dbentry(Request $request, $list_id, $list_col_id){
        session_start();

        if (!isset($_SESSION['id']))
            return Response::redirectTo('/login');

        $list = List_::where(["user_id" => $_SESSION["id"], "id" => $list_id])->with(["list_columns"])->first();
        if(is_null($list)) return "error";

        $validator = Validator::make($request->all(), [
            'content'=> 'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else{
            $list_entry = new list_entry();
            $list_entry->column_id = $request->input("col_id");
            $list_entry->content = $request->input("content");
            $list_entry->save();
            return response()->json([
                'status'=> 200,
                'message'=> "Entry Added Successfully!",
            ]);
        }

    } 

    public function add_dbentry(Request $request, $list_id, $list_col_id){
        session_start();
        if (!isset($_SESSION['id']))
        return redirect('/login');

        $list = List_::find($list_id);
        $list_col = list_column::find($list_col_id);

        if($list && $list_col){
            return response()->json([
                'status'=> 200,
                'list'=> $list,
                'column' => $list_col,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'message'=> "Column was not found",
            ]);
        }

    } 
}
