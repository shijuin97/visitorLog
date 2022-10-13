<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VisitorsLog;
use App\Units;

class RegisterController extends Controller
{

    public function visitorRegister(Request $request)
    {   
        date_default_timezone_set('Asia/Singapore');
        $dateTime = date('Y-m-d H:i:s', time());
        if($request->option === 'unit'){
            $check_visitors_log = VisitorsLog::where("isExit", 0)->get()->count();
            if($check_visitors_log < 8){
                $visitors_log = new VisitorsLog();
                $visitors_log->unit_id = $request->unit_id;
                $visitors_log->visitor_name = $request->visitor_name;
                $visitors_log->contact_number = $request->contact_number;
                $visitors_log->nric = $request->nric;
                $visitors_log->entry = $dateTime;
                $visitors_log->isExit = 0;
                $visitors_log->isEvent = 1;
                $visitors_log->save();
                return response()->json("success", 200);
            } else {
                return response()->json(['error' => 'Sorry, Unit already maximum up to 8 visitors!'], 400);
            }
        } else {
            $visitors_log = new VisitorsLog();
            $visitors_log->event_name = $request->event_name;
            $visitors_log->visitor_name = $request->visitor_name;
            $visitors_log->contact_number = $request->contact_number;
            $visitors_log->nric = $request->nric;
            $visitors_log->entry = $dateTime;
            $visitors_log->isExit = 1;
            $visitors_log->isEvent = 0;
            $visitors_log->save();
            return response()->json("success", 200);
        }

    }
}
