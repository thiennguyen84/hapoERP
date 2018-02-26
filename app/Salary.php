<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Salary extends Model
{
    use softDeletes;
	protected $datas = ['delete_at'];
    protected $table = 'salarys';

    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function overtimes(){
    	return $this->hasMany('App\Overtime','overtime_id','id');
    }

    public function vacationPartTimes(){
    	return $this->hasMany('App\VacationPartTime','vacation_partime_id','id');
    }

    public function attendsions(){
    	return $this->hasMany('App\Attendsion','attendsion_id','id');
    }
}
