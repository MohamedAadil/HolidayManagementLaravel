<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Holiday;

class HolidayController extends Controller
{

    public function index(){
        $holidays = Holiday::all();
        return response()->json([
            'status'=>200,
            'holidays'=>$holidays,
        ]);
    }

    public function search(Request $request){
        $from = $request->from; 
        $to = $request->to; 
        
        $holidays = Holiday::where('startDate', '>=', $from)->where('endDate', '<=', $to)->get();
        return response()->json([
            'status'=>200,
            'holidays'=>$holidays,
        ]);
    }

    public function store(Request $request)
    {
        $holiday = new Holiday;
        $holiday->name = $request->input('name');
        $holiday->startDate = $request->input('startDate');
        $holiday->endDate = $request->input('endDate');
        $holiday->save();

        return response()->json([
            'status'=>200,
            'message'=>'Holiday Added Successfully',
        ]);
    }

    public function edit($id)
    {
        $holiday = Holiday::find($id);
        return response()->json([
            'status'=>200,
            'holiday'=>$holiday,
        ]);
    }

    public function update(Request $request, $id) 
    {
        $holiday = Holiday::find($id);
        $holiday->name = $request->input('name');
        $holiday->startDate = $request->input('startDate');
        $holiday->endDate = $request->input('endDate');
        $holiday->save();

        return response()->json([
            'status'=>200,
            'message'=>'Holiday Updated Successfully',
        ]);
    }

    public function delete($id)
    {
        $holiday = Holiday::find($id);
        $holiday->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Holiday Deleted Successfully',
        ]);
    }
}