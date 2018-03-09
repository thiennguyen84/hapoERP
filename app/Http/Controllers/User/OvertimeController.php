<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Overtime;
use Auth;
use Validator;
use App\Http\Controllers\Controller;

class OvertimeController extends Controller
{
    public function index()
    {
        $overtime = Overtime::where('user_id', Auth::user()->id)->paginate(config('app.pagination'));
        return view("employees.overtime.index", ['overtime' => $overtime]);
    }

    public function create()
    {
        return view("employees.overtime.create");
    }

    public function store(Request $request)
    {
        $overtime = new Overtime();
        $overtime->date = $request->date;
        $overtime->start_time = $request->from;
        $overtime->end_time = $request->to;
        $overtime->content = $request->content;
        // count hours OT
        $toTime = strtotime($overtime->end_time);
        $fromTime = strtotime($overtime->start_time);
        $hour = ceil($toTime - $fromTime)/(60*60);
        $overtime->hours = $hour;
        $overtime->user_id = Auth::user()->id;
        
        $overtime->save();
        $request->session()->flash('success',trans('message.add_success'));
        return redirect()->route('overtime.index');  
    }

    public function show($id)
    {
        $overtime = Overtime::findOrFail($id);
        return view("employees.overtime.show",['overtime' => $overtime]);
    }

    public function edit($id)
    {
        $overtime = Overtime::findOrFail($id);
        return view("employees.overtime.edit",['overtime' => $overtime]);
    }

    public function update(Request $request, $id)
    {
        $overtime = Overtime::findOrFail($id);
        $overtime->date = $request->date;
        $overtime->start_time = $request->from;
        $overtime->end_time = $request->to;
        $overtime->content = $request->content;
        // count hours OT
        $toTime = strtotime($overtime->end_time);
        $fromTime = strtotime($overtime->start_time);
        $hour = ceil($toTime - $fromTime)/(60*60);
        $overtime->hours = $hour;
        $overtime->user_id = Auth::user()->id;
        $overtime->save();
        $request->session()->flash('success', trans('message.edit_success'));
        return redirect()->route('overtime.index');
    }

    public function destroy($id)
    {
    	$overtime = Overtime::findOrFail($id);
    	$overtime->delete();
    	return redirect()->route('overtime.index')->with('success', trans('message.delete_success'));
    }

     public function statistic()
    {
        $dateTime = Overtime::where('user_id', Auth::user()->id)->orderBy('date', 'desc')->value('date');
        $dateTimeDay = substr( $dateTime , 0, 7);
        $sumOvertime = Overtime::where('user_id', Auth::user()->id)->where('date', "LIKE", "%". $dateTimeDay ."%")->sum('hours');
        $overtime = Overtime::where('user_id', Auth::user()->id)->where('date', "LIKE", "%". $dateTimeDay ."%")->paginate(config('app.pagination'));
        return view("employees.overtime.statistic",['overtime' => $overtime, 'sumOvertime' => $sumOvertime]);
    }

}
