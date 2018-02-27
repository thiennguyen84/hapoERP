<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class VacationPartTime extends Model
{
	use softDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'vacation_parttimes';

    public function user(){
    	return $this->belongsTo(User::class);
    }

}
