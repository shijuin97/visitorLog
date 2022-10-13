<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VisitorsLog;
use App\Units;

class VisitorController extends Controller
{

    public function createVisitor(Request $request)
    {

            date_default_timezone_set('Asia/Singapore');
            $dateTime = date('Y-m-d H:i:s', time());
            $visitors_log = new VisitorsLog();
            $visitors_log->unit_id = $request->unit_id;
            $visitors_log->visitor_name = $request->visitor_name;
            $visitors_log->contact_number = $request->contact_number;
            $visitors_log->nric = $request->nric;
            $visitors_log->entry = $dateTime;
            $visitors_log->isExit = 0;
            $visitors_log->save();
            return response()->json("success", 200);
        
    }

    public function getAllVisitors($status)
    {
        if($status === 'All'){
            $visitors_log = VisitorsLog::all();
        } elseif($status === '3 Months'){
            date_default_timezone_set('Asia/Singapore');
            $pastTime = date('Y-m-d H:i:s', strtotime('-3 month'));
            $todayTime = date('Y-m-d H:i:s', time());
            $visitors_log = VisitorsLog::whereBetween('created_at', [$pastTime, $todayTime])->get();
        }
        
        foreach($visitors_log as $visitor_log):
            if(isset($visitor_log->unit_id)){
                $visitor_log->setAttribute("unit_visit", Units::find($visitor_log->unit_id)->block.','.Units::find($visitor_log->unit_id)->unit_number);
            } else {
                $visitor_log->setAttribute("unit_visit", "");
            }
        endforeach;
        return response()->json($visitors_log);
    }

    public function checkOutById($id)
    {
        date_default_timezone_set('Asia/Singapore');
        $dateTime = date('Y-m-d H:i:s', time());
        $visitors_log = VisitorsLog::find($id);
        if($visitors_log->isEvent === 1){
            $visitors_log->exit = $dateTime;
            $visitors_log->isExit = 1;
        } else {
            $visitors_log->exit = $dateTime;
            $visitors_log->isEvent = 1;
        }
        $visitors_log->save();
        return redirect('/admin/visitor');
    }
}
