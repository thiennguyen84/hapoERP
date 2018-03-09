<?php

namespace App\Http\Controllers\User;

use App\Models\Report;
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    
    public function index()
    {
        $report = Report::where('user_id', Auth::user()->id)->paginate(config('app.pagination'));
        return view("employees.report.index", ['report' => $report]);
    }

    public function create()
    {
        return view("employees.report.create");
    }

    public function store(Request $request)
    {
        $report = new Report();
        $report->date = $request->date;
        $report->today_content = $request->todayContent;
        $report->tomorrow_content = $request->tomorrowContent;
        $report->problem = $request->problem;
        $report->user_id = Auth::user()->id;
        
        $report->save();
        $request->session()->flash('success', trans('message.add_success'));
        return redirect()->route('report.index');  
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view("employees.report.show", ['report' => $report]);
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view("employees.report.edit", ['report' => $report]);
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->today_content = $request->todayContent;
        $report->tomorrow_content = $request->tomorrowContent;
        $report->problem = $request->problem;
        $report->save();
        $request->session()->flash('success', trans('message.edit_success'));
        return redirect()->route('report.index');
    }
}
