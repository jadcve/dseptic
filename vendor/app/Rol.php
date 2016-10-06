<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model {

    protected $table = 'rols';

    public function users() {
        return $this->hasMany('User');
    }
    
}

?>
