<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Overtime extends Model
{
	use softDeletes;
	protected $datas = ['delete_at'];
    protected $table = 'overtimes';

    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function salary(){
    	return $this->belongsTo('App\Salary','overtime_id','id');
    }
}
