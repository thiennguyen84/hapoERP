<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VacationFullTime extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'vacation_fulltimes';

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
