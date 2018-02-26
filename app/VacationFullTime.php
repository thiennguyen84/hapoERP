<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class VacationFullTime extends Model
{
	use softDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'vacation_fulltimes';

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
