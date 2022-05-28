<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Event;
use Illuminate\Support\Facades\Response;

class CalendarController extends Controller
{
    public function create_calendar(){
        session_start();

        if (!isset($_SESSION['id']))
            return Response::json([
                'success' => false,
                'message' => 'You must be logged in to access the calendar.'
            ], 401);

        $calendar = new Calendar();
        $calendar->user_id = $_SESSION['id'];
        $calendar->save();
        return Response::json([
            'success' => true,
            'message' => 'You can access your personal calendar!.'
        ], 200);
    }

    public function create_event(Request $request, $calendar_id){
        session_start();

        if (!isset($_SESSION['id']))
            return Response::json([
                'success' => false,
                'message' => 'You must be logged in to access the calendar.'
            ], 401);

            $calendar = Calendar::where(["user_id" => $_SESSION["id"], "id" => $calendar_id])->first();
            if(is_null($calendar)) 
                return Response::json([
                    'success' => false,
                    'message' => 'Your calendar cannot be accessed.'
                ], 400);
    
            $validator = Validator::make($request->all(), [
                'description'=> 'required',
                'occurrence_date' => 'required',
            ]);
    
            if($validator->fails()){
                return Response::json([
                    'success' => false,
                    'message' => 'Please enter the required details.'
                ], 400);
            }

            $event = new Event();
            $event->calendar_id = $calendar_id;
            $event->description = $request->input('description');
            $event->occurrence_date = $request->input('occurrence_date');
            $event->save();

            return Response::json([
                'success' => true,
                'message' => 'Event Created Successfully!'
            ], 200);
    }
    
    public function edit_event(Request $request, $calendar_id, $event_id){
        session_start();

        if (!isset($_SESSION['id']))
            return Response::json([
                'success' => false,
                'message' => 'You must be logged in to access the calendar.'
            ], 401);

            $calendar = Calendar::where(["user_id" => $_SESSION["id"], "id" => $calendar_id])->first();
            if(is_null($calendar)) 
                return Response::json([
                    'success' => false,
                    'message' => 'Your calendar cannot be accessed.'
                ], 400);

            $event = $calendar->events->where('id', $event_id)->first();

            if (!$event) {
                return Response::json([
                    'success' => false,
                    'message' => 'Bad Request'
                ], 400);
            }

            $event->calendar_id = $calendar_id;
            $event->description = $request->input('description');
            $event->occurrence_date = $request->input('occurrence_date');
            $event->update();

            return Response::json([
                'success' => true,
                'message' => 'Event Updated Successfully!'
            ], 200);

    }

    public function delete_event(Request $request, $calendar_id, $event_id){
        session_start();

        if (!isset($_SESSION['id']))
            return Response::json([
                'success' => false,
                'message' => 'You must be logged in to access the calendar.'
            ], 401);

        $calendar = Calendar::where(["user_id" => $_SESSION["id"], "id" => $calendar_id])->first();
        if(is_null($calendar)) 
            return Response::json([
                'success' => false,
                'message' => 'Your calendar cannot be accessed.'
            ], 400);

        $event = $calendar->events->where('id', $event_id)->first();

        if (!$event) {
            return Response::json([
                'success' => false,
                'message' => 'Bad Request'
            ], 400);
        }

        $event->delete();
        return Response::json([
            'success' => true,
            'message' => 'Event Deleted Successfully!'
        ], 200);

    }
    
    public function display_calendar($calendar_id){
        session_start();

        if (!isset($_SESSION['id']))
            return Response::json([
                'success' => false,
                'message' => 'You must be logged in to access the calendar.'
            ], 401);
        
        $calendar = Calendar::where(["user_id" => $_SESSION["id"], "id" => $calendar_id])->with("events")->first();
        if(is_null($calendar)) 
            return Response::json([
                'success' => false,
                'message' => 'Your calendar cannot be accessed.'
            ], 400);

        return Response::view('', ['calendar' => $calendar]);
    }
}