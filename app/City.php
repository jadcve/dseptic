<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $table = 'city';
    protected $fillable = ['CITY','ID_STATE'];
    protected $guarded = ['id'];

}
