<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Salary extends Model
{
    use softDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'salarys';

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function overTimes(){
    	return $this->hasMany(Overtime::class);
    }

    public function vacationPartTimes(){
    	return $this->hasMany(VacationPartTime::class);
    }

    public function attendsions(){
    	return $this->hasMany(Attendsion::class);
    }
}
