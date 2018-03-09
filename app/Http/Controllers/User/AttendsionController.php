<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Attention;
use Auth;
use Validator;
use App\Http\Controllers\Controller;


class AttendsionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendsion = Attention::where('user_id', Auth::user()->id)->paginate(config('app.pagination'));
        return view("employees.attendsion.index", ['attendsion' => $attendsion]);
    }

    public function create()
    {
        $attendsion = new Attention();
        $attendsion->date = date('Y-m-d H:i:s');
        $attendsion->user_id = Auth::user()->id;
        $dateTime = Attention::where('user_id', Auth::user()->id)->orderBy('date','desc')->value('date');
        // cut element
        $dateTimeDay = substr( $dateTime , 0, 10);
        $date = substr($attendsion->date, 0, 10);
        if(!($date === $dateTimeDay)) {
        $attendsion->save();
        session()->flash('success', trans('message.attendtion_success'));
        return redirect()->route('attendsion.index'); 
        }
        else 
        session()->flash('success', trans('message.attendtion_fail'));
        return redirect()->route('attendsion.index'); 
    }

     public function statistic()
    {
        $dateTime = Attention::where('user_id', Auth::user()->id)->orderBy('date', 'desc')->value('date');
        // cut element
        $dateTimeDay = substr( $dateTime ,0 ,7);
        $attendsion = Attention::where('user_id',Auth::user()->id)->where('date', "LIKE", "%". $dateTimeDay ."%")->paginate(config('app.pagination'));
        return view("employees.attendsion.statistic", ['attendsion' => $attendsion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
