<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendsion extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at']; 
    protected $table = 'attendsions';

    public function user(){
    	return $this->belongsToMany(User::class);
    }

}
