<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Overtime extends Model
{
	use softDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'overtimes';

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function salary(){
    	return $this->belongsTo(Salary::class);
    }
}
