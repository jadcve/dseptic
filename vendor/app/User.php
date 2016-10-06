<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','rol_id','PHONE',
        'PHONE2','PHONE3','ID_PHONE_COMPANY','ID_PHONE_COMPANY2','ID_PHONE_COMPANY3'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
//     public function isAdmin()
//    {
//        return ($this->rol_id == 1);
//
//    }
//    public function isOperator()
//    {
//        return ($this->rol_id == 2);
//    }
    
    public function Tickets() {
        return $this->hasMany('Ticket');
    }
    
    public function userRol() {
      return $this->belongsTo('App\Rol', 'rol_id');
    }
    
}
