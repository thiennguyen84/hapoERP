<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use softDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $datas = [
        'delete_at',
        'birthday',
    ];
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function attendsions(){
        return $this->hasMany('App\Attendsion','user_id','id');
    }

    public function vacationFullTimes(){
        return $this->hasMany('App\VacationFullTime','user_id','id');
    }

    public function vacationPartTimes(){
        return $this->hasMany('App\VacationPartTime','user_id','id');
    }

    public function reports(){
        return $this->hasMany('App\Report','user_id','id');
    }

    public function overTimes(){
        return $this->hasMany('App\Overtime','user_id','id');
    }

    public function salarys(){
        return $this->hasMany('App\Salary','user_id','id');
    }      
}
