<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Attendsion extends Model
{
	use softDeletes;
	protected $datas = ['delete_at']; 
    protected $table = 'attendsions';

    public function user(){
    	return $this->belongsToMany('App\User','user_id','id');
    }

    public function salarys(){
    	return $this->belongsMany('App\Salary','attendsion_id','id');
    }
}
