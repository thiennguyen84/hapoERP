<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Overtime;
use Auth;
use DB;
use Validator;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class OvertimeController extends Controller
{
    public function index()
    {
        // statistical attendsions of day
        $overtimes = Overtime::select(DB::raw('sum(hours) as sum_hours, user_id'))
                     ->whereDate('date', Carbon::now()->format('Y-m-d'));
        $sumHours = $overtimes->sum('hours');
        $overtimes = $overtimes->groupBy('user_id')->paginate(config('app.pagination'));
        // statistical attendsions of Month
        $filterNames = Overtime::select(DB::raw('sum(hours) as sum_hours, user_id'))
                     ->whereMonth('date', Carbon::now()->format('m'))
                     ->whereYear('date', Carbon::now()->format('Y'))
                     ->groupBy('user_id')
                     ->paginate(config('app.pagination'));
        $data = [
            'overtimes' => $overtimes,
            'filterNames' => $filterNames,
            'sumHours' => $sumHours,
        ];
        return view("admin.overtime.index", $data);
    }

    public function show($user_id)
    {
        $overtimes = Overtime::where('user_id',$user_id)
                    ->whereDate('date', Carbon::now()->format('Y-m-d'))->get();
        $data = [
            'overtimes' => $overtimes,
        ];
        return view("admin.overtime.show", $data);
    }

    public function statistical($user_id)
    {
        $overtimes = Overtime::where('user_id', $user_id)
                    ->whereMonth('date', Carbon::now()->format('m'))
                    ->whereYear('date', Carbon::now()->format('Y'))->paginate(config('app.pagination'));
        $sumHours = $overtimes->sum('hours');
        $data = [
            'overtimes' => $overtimes,
            'sumHours' => $sumHours,
        ];
        return view("admin.overtime.statistical", $data);
    }

}
