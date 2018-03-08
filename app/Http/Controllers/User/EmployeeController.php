<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;
use App\Models\User;
use File;
use Validator;
use Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $name = $request->search;
        $employees = User::where('department', Auth::user()->department)->where('name','like','%'.$name.'%')->orderBy('name', 'desc')->paginate(config('app.paginate'));
        return view('employee.user.index',['employees'=>$employees,'name'=>$name]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new User();
        $employee->name = $request->name;
        $employee->password = bcrypt("1234567890");
        $employee->email = $request->email;
        $employee->department = Auth::user()->department;
        $employee->level_employee = "employee";
        $employee->save();
        return redirect()->route('employs.index')->with('success',trans('message.add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee= User::findOrFail($id);
        return view('employee.user.show',['employee'=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::findOrFail($id);
        return view('employee.user.edit',['employee'=>$employee]);
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
        $employee = User::findOrFail($id);
        if($request->hasFile('avatar')){
            $file= $employee->avatar;
            File::delete('img/'.$file);
            $fileChange = $request->avatar;
            $fileChange->move('img',$fileChange->getClientOriginalName());
            $employee->avatar = $fileChange->getClientOriginalName();
            $employee->save();
        }
        $employee->name = $request->name;
        $employee->address = $request->address;
        $employee->birthday = $request->birthday;
        $employee->email = $request->email;
        $employee->save();
        return redirect()->route('employs.show',$employee->id)->with('success',trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::findOrFail($id);
        $file= $employee->image;
        File::delete('img/'.$file);
        $employee->delete();
        return redirect()->route('employs.index')->with('success',trans('message.delete'));
    }
}
