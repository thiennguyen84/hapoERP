<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use App\Models\User;
use Auth;
use Validator;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    
    public function index()
    {
        $reports = Report::whereDate('date', Carbon::now()->format('Y-m-d'))->paginate(config('app.pagination'));
        $data = [
            'reports' => $reports,
        ];
        return view("admin.report.index", $data);
    }
 
    public function show($user_id)
    {
        $reports = Report::findOrFail($user_id);
        $data = [
            'reports' => $reports,
        ];
        return view("admin.report.show", $data);
    }

}
