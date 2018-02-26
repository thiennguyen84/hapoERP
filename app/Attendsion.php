<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Attendsion extends Model
{
	use softDeletes;
	protected $dates = ['deleted_at']; 
    protected $table = 'attendsions';

    public function user(){
    	return $this->belongsToMany(User::class);
    }

    public function salarys(){
    	return $this->belongsMany(Salary::class);
    }
}
