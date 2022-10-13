<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Units;

class UnitsController extends Controller
{

    public function createUnit(Request $request)
    {

            $units = new Units();
            $units->block = $request->block;
            $units->unit_number = $request->unit_number;
            $units->occupant_name = $request->occupant_name;
            $units->contact_number = $request->contact_number;
            $units->save();
            return response()->json("success", 200);
        
    }

    public function getAllUnits()
    {
        $units = Units::all();
        return response()->json($units);
    }

    public function deleteUnitById($id)
    {
        $unit = Units::find($id);
        $unit->delete();
        return redirect('/admin/unit');
    }

    public function getUnitById($id)
    {
        $unit = Units::find($id);
        return response()->json($unit);
    }

    public function editUnit(Request $request)
    {
        $units = Units::find($request->id);
        $units->block = $request->block;
        $units->unit_number = $request->unit_number;
        $units->occupant_name = $request->occupant_name;
        $units->contact_number = $request->contact_number;
        $units->save();
        return response()->json("success", 200);
    }
}
