<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Report extends Model
{
	use softDeletes;
	protected $datas = ['delete_at'];
    protected $table = 'reports';

    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }
}
